<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeaveApprovalRequest;
use App\Http\Requests\StoreLeaveApprovalRequest;
use App\Http\Requests\UpdateLeaveApprovalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveApprovals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('leave_approval_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveApprovals.create');
    }

    public function store(StoreLeaveApprovalRequest $request)
    {
        $leaveApproval = LeaveApproval::create($request->all());

        return redirect()->route('admin.leave-approvals.index');
    }

    public function edit(LeaveApproval $leaveApproval)
    {
        abort_if(Gate::denies('leave_approval_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveApprovals.edit', compact('leaveApproval'));
    }

    public function update(UpdateLeaveApprovalRequest $request, LeaveApproval $leaveApproval)
    {
        $leaveApproval->update($request->all());

        return redirect()->route('admin.leave-approvals.index');
    }

    public function show(LeaveApproval $leaveApproval)
    {
        abort_if(Gate::denies('leave_approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveApprovals.show', compact('leaveApproval'));
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
