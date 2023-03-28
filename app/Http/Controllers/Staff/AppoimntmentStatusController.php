<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppoimntmentStatusRequest;
use App\Http\Requests\StoreAppoimntmentStatusRequest;
use App\Http\Requests\UpdateAppoimntmentStatusRequest;
use App\Models\AppoimntmentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppoimntmentStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appoimntment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appoimntmentStatuses = AppoimntmentStatus::all();

        return view('staff.appoimntmentStatuses.index', compact('appoimntmentStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('appoimntment_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.appoimntmentStatuses.create');
    }

    public function store(StoreAppoimntmentStatusRequest $request)
    {
        $appoimntmentStatus = AppoimntmentStatus::create($request->all());

        return redirect()->route('staff.appoimntment-statuses.index');
    }

    public function edit(AppoimntmentStatus $appoimntmentStatus)
    {
        abort_if(Gate::denies('appoimntment_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.appoimntmentStatuses.edit', compact('appoimntmentStatus'));
    }

    public function update(UpdateAppoimntmentStatusRequest $request, AppoimntmentStatus $appoimntmentStatus)
    {
        $appoimntmentStatus->update($request->all());

        return redirect()->route('staff.appoimntment-statuses.index');
    }

    public function show(AppoimntmentStatus $appoimntmentStatus)
    {
        abort_if(Gate::denies('appoimntment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.appoimntmentStatuses.show', compact('appoimntmentStatus'));
    }

    public function destroy(AppoimntmentStatus $appoimntmentStatus)
    {
        abort_if(Gate::denies('appoimntment_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appoimntmentStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppoimntmentStatusRequest $request)
    {
        AppoimntmentStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
