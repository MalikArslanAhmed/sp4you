<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBillingRunRequest;
use App\Http\Requests\StoreBillingRunRequest;
use App\Http\Requests\GenerateInvoiceRequest;
use App\Http\Requests\MassGenerateInvoiceRequest;
use App\Models\Invoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BillingRunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('billing_run_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoices = Invoice::where('status', 'in-progress')
            ->with(['client', 'user', 'expense', 'assigned_staffs.user'])->get();
        return view('admin.billingRuns.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('billing_run_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.create');
    }

    public function store(StoreBillingRunRequest $request)
    {
        $billingRun = Invoice::create($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function edit(Invoice $billingRun)
    {
        abort_if(Gate::denies('billing_run_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.edit', compact('billingRun'));
    }

    public function update(UpdateBillRequest $request, Invoice $billingRun)
    {
        $billingRun->update($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('billing_run_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $invoice = Invoice::where('id', $id)->with(['client', 'user', 'expense', 'assigned_staffs.user'])->first();

        return view('admin.billingRuns.show', compact('invoice'));
    }

    public function destroy(Invoice $billingRun)
    {
        abort_if(Gate::denies('billing_run_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $billingRun->delete();

        return back();
    }

    public function massDestroy(MassDestroyBillingRunRequest $request)
    {
        Invoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function generateInvoice(GenerateInvoiceRequest $request, $id)
    {
        // dd($request);
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('admin.billing-runs.index');
    }
    public function multipleInvoiceApproval(MassGenerateInvoiceRequest $request)
    {
        $invoices = Invoice::wherein('id', request('ids'))
            ->update(['status' => 'invoice-generated']);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
