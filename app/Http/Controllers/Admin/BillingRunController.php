<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBillingRunRequest;
use App\Http\Requests\StoreBillingRunRequest;
use App\Http\Requests\GenerateInvoiceRequest;
use App\Models\Bill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BillingRunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('billing_run_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bills = Bill::where('status','!=','approved')
        ->with(['client', 'user', 'expense'])->get();

        return view('admin.billingRuns.index', compact('bills'));
    }

    public function create()
    {
        abort_if(Gate::denies('billing_run_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.create');
    }

    public function store(StoreBillingRunRequest $request)
    {
        $billingRun = Bill::create($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function edit(Bill $billingRun)
    {
        abort_if(Gate::denies('billing_run_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.edit', compact('billingRun'));
    }

    public function update(UpdateBillRequest $request, Bill $billingRun)
    {
        $billingRun->update($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('billing_run_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bill = Bill::where('id',$id)->with(['client', 'user', 'expense'])->first();

        return view('admin.billingRuns.show', compact('bill'));
    }

    public function destroy(Bill $billingRun)
    {
        abort_if(Gate::denies('billing_run_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $billingRun->delete();

        return back();
    }

    public function massDestroy(MassDestroyBillingRunRequest $request)
    {
        Bill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function generateInvoice(GenerateInvoiceRequest $request, $id)
    {
        // dd($request);
        $bill = Bill::findOrFail($id);
        $bill->update($request->all());

        return redirect()->route('admin.billing-runs.index');
    }
}
