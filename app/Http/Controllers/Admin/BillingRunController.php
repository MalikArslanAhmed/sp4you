<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBillingRunRequest;
use App\Http\Requests\StoreBillingRunRequest;
use App\Http\Requests\UpdateBillingRunRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BillingRunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('billing_run_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('billing_run_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.create');
    }

    public function store(StoreBillingRunRequest $request)
    {
        $billingRun = BillingRun::create($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function edit(BillingRun $billingRun)
    {
        abort_if(Gate::denies('billing_run_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.edit', compact('billingRun'));
    }

    public function update(UpdateBillingRunRequest $request, BillingRun $billingRun)
    {
        $billingRun->update($request->all());

        return redirect()->route('admin.billing-runs.index');
    }

    public function show(BillingRun $billingRun)
    {
        abort_if(Gate::denies('billing_run_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.billingRuns.show', compact('billingRun'));
    }

    public function destroy(BillingRun $billingRun)
    {
        abort_if(Gate::denies('billing_run_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $billingRun->delete();

        return back();
    }

    public function massDestroy(MassDestroyBillingRunRequest $request)
    {
        BillingRun::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
