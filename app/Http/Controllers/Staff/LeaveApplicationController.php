<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeaveApplicationRequest;
use App\Http\Requests\StaffRequests\StoreLeaveApplicationRequest;
use App\Http\Requests\StaffRequests\UpdateLeaveApplicationRequest;
use App\Models\LeaveApplication;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LeaveApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplications = LeaveApplication::with(['staff_member'])
            ->where('staff_member_id', Auth::user()->id)
            ->get();

        return view('staff.leaveApplications.index', compact('leaveApplications'));
    }

    public function create()
    {
        abort_if(Gate::denies('leave_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('staff.leaveApplications.create', compact('staff_members'));
    }

    public function store(StoreLeaveApplicationRequest $request)
    {
        $req_data = $request->all();
        $req_data['staff_member_id'] = Auth::user()->id;
        $leaveApplication = LeaveApplication::create($req_data);

        return redirect()->route('staff.leave-applications.index');
    }

    public function edit(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leaveApplication->load('staff_member');

        return view('staff.leaveApplications.edit', compact('leaveApplication', 'staff_members'));
    }

    public function update(UpdateLeaveApplicationRequest $request, LeaveApplication $leaveApplication)
    {
        $leaveApplication->update($request->all());

        return redirect()->route('staff.leave-applications.index');
    }

    public function show(LeaveApplication $leaveApplication)
    {
        abort_if(Gate::denies('leave_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApplication->load('staff_member');

        return view('staff.leaveApplications.show', compact('leaveApplication'));
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
