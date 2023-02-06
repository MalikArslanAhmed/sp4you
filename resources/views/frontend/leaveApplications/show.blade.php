@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.leaveApplication.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.leave-applications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $leaveApplication->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.staff_member') }}
                                    </th>
                                    <td>
                                        {{ $leaveApplication->staff_member->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.leave_start') }}
                                    </th>
                                    <td>
                                        {{ $leaveApplication->leave_start }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.leave_ends') }}
                                    </th>
                                    <td>
                                        {{ $leaveApplication->leave_ends }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $leaveApplication->notes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.leaveApplication.fields.approved') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $leaveApplication->approved ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.leave-applications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection