<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeaveApprovalRequest;
use App\Http\Requests\UpdateLeaveApprovalRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LeaveApplication;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $leaveApplications = LeaveApplication::with(['staff_member'])->get();

        return view('staff.leaveApprovals.index', compact('leaveApplications'));
    }

    public function approved(UpdateLeaveApprovalRequest $request, $id)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);
        $leaveApplication->update($request->all());

        return redirect()->route('staff.leave-approvals.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('leave_approval_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff_members = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $leaveApplication = LeaveApplication::findOrFail($id);

        $leaveApplication->load('staff_member');

        return view('staff.leaveApprovals.edit', compact('leaveApplication', 'staff_members'));
    }

    public function update(UpdateLeaveApprovalRequest $request, $id)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);

        $leaveApplication->update($request->all());

        return redirect()->route('staff.leave-approvals.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('leave_approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $leaveApproval = LeaveApplication::findOrFail($id);

        return view('staff.leaveApprovals.show', compact('leaveApproval'));
    }

    public function destroy(LeaveApproval $leaveApproval)
    {
        abort_if(Gate::denies('leave_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveApproval->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeaveApprovalRequest $request)
    {
        LeaveApproval::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
