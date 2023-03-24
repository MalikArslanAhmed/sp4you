<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\GenerateInvoiceRequest;
use App\Http\Requests\MassGenerateInvoiceRequest;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Invoice;
use App\Models\Expense;
use Carbon\Carbon;
use DateTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Dcblogdev\Xero\Facades\Xero;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class InvoicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::where('status', '!=', 'in-progress')
            ->with(['client', 'user', 'expense', 'assigned_staffs.user'])->get();

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id');

        $appointments = Appointment::pluck('start_time', 'id');

        return view('admin.invoices.create', compact('appointments', 'clients'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());
        $invoice->clients()->sync($request->input('clients', []));
        $invoice->appointments()->sync($request->input('appointments', []));

        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id');

        $appointments = Appointment::pluck('start_time', 'id');

        $invoice->load('clients', 'appointments');

        return view('admin.invoices.edit', compact('appointments', 'clients', 'invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());
        $invoice->clients()->sync($request->input('clients', []));
        $invoice->appointments()->sync($request->input('appointments', []));

        return redirect()->route('admin.invoices.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('billing_run_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoice = Invoice::where('id', $id)->with(['client', 'user', 'expense'])->first();

        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function generateInvoice(GenerateInvoiceRequest $request, $id)
    {
        $invoiceDetails = Invoice::where('id', $id)->with('client')->first();
        $xero_contact = Http::withHeaders([
            'Authorization' => 'Bearer ' . Xero::getTokenData()['access_token'],
            'Xero-tenant-Id' => Xero::getTokenData()['tenant_id'],
        ])
            ->get('https://api.xero.com/api.xro/2.0/Contacts?page=1&where=EmailAddress="' . $invoiceDetails['client']['email'] . '"')->json();
        if ($xero_contact['Status'] !== 'OK') {
            DB::table('xero_tokens')->truncate();
            return redirect('/xero/connect');
        }

        if (count($xero_contact['Contacts']) == 0) {
            $xero_data =                     [
                "Name" => $invoiceDetails->client->first_name . ' ' . $invoiceDetails->client->last_name,
                "FirstName" => $invoiceDetails->client->first_name,
                "LastName" => $invoiceDetails->client->last_name,
                "EmailAddress" => $invoiceDetails->client->email
            ];
            $xero_contact = Xero::contacts()->store($xero_data);
        } else {
            $xero_contact = $xero_contact['Contacts'][0];
        }
        // dd( $xero_contact);
        $invoiceUpdate = Invoice::findOrFail($id);
        // $expense = Expense::findOrFail($request->all()['expense_id']);
        $xero_data = [
            "Type" => "ACCREC",
            "Contact" => [
                "ContactID" =>   $xero_contact['ContactID']
            ],
            "LineItems" => [
                [
                    "Description" =>  $invoiceDetails['description'] ? $invoiceDetails['description'] : 'Nill',
                    "Quantity" => $invoiceDetails['total_hours_consumed'] ? $invoiceDetails['total_hours_consumed'] : 1,
                    "UnitAmount" => $invoiceDetails['hour_charges'] ? $invoiceDetails['hour_charges'] : $invoiceDetails['total_amount'],
                    "AccountCode" => "200",
                    "TaxType" => "NONE",
                    "LineAmount" => $invoiceDetails['total_amount']
                ],
            ],
            "Date" => (new DateTime())->format('Y-m-d'),
            "DueDate" => Carbon::now()->addDays(9)->format('Y-m-d'),
            "Reference" => "INV-" . $invoiceDetails['id'],
            "status" => "AUTHORISED",
        ];
        $xero_invoice = Xero::invoices()->store($xero_data);
        $xero_contact = Xero::post('Invoices/' . $xero_invoice['InvoiceID'] . '/Email');
        $data = $request->all();
        $data['xero_invoice_id'] =  $xero_invoice['InvoiceID'];
        $invoiceUpdate->update($data);

        return redirect()->route('admin.invoices.index');
    }

    public function generateSingleInvoice(MassGenerateInvoiceRequest $request)
    {
        $invoices = Invoice::wherein('id', request('ids'))
            ->with(['client', 'expense', 'assigned_staffs.user', 'appointment'])->get();
        $checkIfClientAreSame = true;
        $clientId = $invoices[0]['client']['id'];
        foreach ($invoices as $invoice) {
            if ($invoice['client']['id'] !== $clientId) {
                $checkIfClientAreSame = false;
            }
        }
        if (!$checkIfClientAreSame) {
            return 'error';
        }
        // same data
        $invoiceDetails = $invoices[0];
        $xero_contact = Http::withHeaders([
            'Authorization' => 'Bearer ' . Xero::getTokenData()['access_token'],
            'Xero-tenant-Id' => Xero::getTokenData()['tenant_id'],
        ])
            ->get('https://api.xero.com/api.xro/2.0/Contacts?page=1&where=EmailAddress="' . $invoiceDetails['client']['email'] . '"')->json();
        if ($xero_contact['Status'] !== 'OK') {
            DB::table('xero_tokens')->truncate();
            return redirect('/xero/connect');
        }
        if (count($xero_contact['Contacts']) == 0) {
            $xero_data =                     [
                "Name" => $invoiceDetails->client->first_name . ' ' . $invoiceDetails->client->last_name,
                "FirstName" => $invoiceDetails->client->first_name,
                "LastName" => $invoiceDetails->client->last_name,
                "EmailAddress" => $invoiceDetails->client->email
            ];
            $xero_contact = Xero::contacts()->store($xero_data);
        } else {
            $xero_contact = $xero_contact['Contacts'][0];
        }
        $xero_data = [
            "Type" => "ACCREC",
            "Contact" => [
                "ContactID" =>   $xero_contact['ContactID']
            ],
            "LineItems" => [],
            "Date" => (new DateTime())->format('Y-m-d'),
            "DueDate" => Carbon::now()->addDays(9),
            "Reference" => "INV-" . $invoiceDetails['id'],
            "status" => "AUTHORISED",
        ];
        foreach ($invoices as $invoice) {
            array_push(
                $xero_data['LineItems'],
                [
                    "Description" =>  $invoice['description'],
                    "Quantity" => $invoice['total_hours_consumed'],
                    "UnitAmount" => $invoice['hour_charges'],
                    "AccountCode" => "200",
                    "TaxType" => "NONE",
                    "LineAmount" => $invoice['total_amount']
                ]
            );
        }
        $xero_invoice = Xero::invoices()->store($xero_data);
        $xero_contact = Xero::post('Invoices/' . $xero_invoice['InvoiceID'] . '/Email');
        $data = $request->all();
        $data['xero_invoice_id'] =  $xero_invoice['InvoiceID'];
        Invoice::wherein('id', request('ids'))
            ->update([
                'status' => 'approved',
                'xero_invoice_id' => $xero_invoice['InvoiceID'],
            ]);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
