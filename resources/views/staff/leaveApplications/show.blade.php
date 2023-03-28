@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.leaveApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('staff.leave-applications.index') }}">
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
                            {{ $leaveApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.staff_member') }}
                        </th>
                        <td>
                            {{ $leaveApplication->staff_member->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_start') }}
                        </th>
                        <td>
                            {{ $leaveApplication->leave_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_ends') }}
                        </th>
                        <td>
                            {{ $leaveApplication->leave_ends }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.user_notes') }}
                        </th>
                        <td>
                            {{ $leaveApplication->user_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.approved') }}
                        </th>
                        <td>
                            {{ $leaveApplication->approved ? 'Yes':'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.admin_notes') }}
                        </th>
                        <td>
                            {{ $leaveApplication->admin_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.editable') }}
                        </th>
                        <td>
                            {{ $leaveApplication->editable ? 'Yes':'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.deleteable') }}
                        </th>
                        <td>
                            {{ $leaveApplication->deleteable ? 'Yes':'No' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('staff.leave-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
