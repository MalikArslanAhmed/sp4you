@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.staffAvailability.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff-availabilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.id') }}
                        </th>
                        <td>
                            {{ $staffAvailability->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.staff_member') }}
                        </th>
                        <td>
                            {{ $staffAvailability->staff_member->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.monday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->monday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->monday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.tuesday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->tuesday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->tuesday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.wednesday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->wednesday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->wednesday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.thursday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->thursday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->thursday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.friday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->friday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->friday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.saturday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->saturday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->saturday_to ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffAvailability.fields.sunday') }}
                        </th>
                        <td>
                            <p><b>From:</b> {{ $staffAvailability->sunday_from ?? '' }}</p>
                            <p><b>to:</b> {{ $staffAvailability->sunday_to ?? '' }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff-availabilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
