<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\GenerateInvoiceRequest;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Bill;
use App\Models\Expense;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bills = Bill::where('status', '!=', 'in-progress')
            ->with(['client', 'user', 'expense'])->get();

        return view('admin.invoices.index', compact('bills'));
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
        $bill = Bill::where('id', $id)->with(['client', 'user', 'expense'])->first();

        return view('admin.invoices.show', compact('bill'));
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
        $bill = Bill::findOrFail($id);
        $bill->update($request->all());

        $expense = Expense::findOrFail($request->all()['expense_id']);
        $expense->update(['bill_id' => $bill->id]);

        return redirect()->route('admin.invoices.index');
    }
}
