<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeaveApplicationRequest;
use App\Http\Requests\StoreLeaveApplicationRequest;
use App\Http\Requests\UpdateLeaveApplicationRequest;
use App\Models\LeaveApplication;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplications = LeaveApplication::with(['staff_member'])->get();

        return view('frontend.leaveApplications.index', compact('leaveApplications'));
    }

    public function create()
    {
        abort_if(Gate::denies('leave_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.leaveApplications.create', compact('staff_members'));
    }

    public function store(StoreLeaveApplicationRequest $request)
    {
        $leaveApplication = LeaveApplication::create($request->all());

        return redirect()->route('frontend.leave-applications.index');
    }

    public function edit(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leaveApplication->load('staff_member');

        return view('frontend.leaveApplications.edit', compact('leaveApplication', 'staff_members'));
    }

    public function update(UpdateLeaveApplicationRequest $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->update($request->all());

        return redirect()->route('frontend.leave-applications.index');
    }

    public function show(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplication->load('staff_member');

        return view('frontend.leaveApplications.show', compact('leaveApplication'));
    }

    public function destroy(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplication->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeaveApplicationRequest $request)
    {
        LeaveApplication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
