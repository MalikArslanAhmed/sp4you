@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.leaveApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leave-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.id') }}
                        </th>
                        <td>
                            {{ $leaveApproval->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.staff_member') }}
                        </th>
                        <td>
                            {{ $leaveApproval->staff_member->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_start') }}
                        </th>
                        <td>
                            {{ $leaveApproval->leave_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_ends') }}
                        </th>
                        <td>
                            {{ $leaveApproval->leave_ends }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.user_notes') }}
                        </th>
                        <td>
                            {{ $leaveApproval->user_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.approved') }}
                        </th>
                        <td>
                            {{ $leaveApproval->approved ? 'Yes':'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.admin_notes') }}
                        </th>
                        <td>
                            {{ $leaveApproval->admin_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.editable') }}
                        </th>
                        <td>
                            {{ $leaveApproval->editable ? 'Yes':'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.deleteable') }}
                        </th>
                        <td>
                            {{ $leaveApproval->deleteable ? 'Yes':'No' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leave-approvals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
