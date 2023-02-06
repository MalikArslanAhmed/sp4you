@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.staffAvailability.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.staff-availabilities.index') }}">
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
                                        {{ $staffAvailability->monday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.tuesday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->tuesday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.wednesday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->wednesday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.thursday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->thursday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.friday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->friday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.saturday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->saturday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.sunday') }}
                                    </th>
                                    <td>
                                        {{ $staffAvailability->sunday }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.staff-availabilities.index') }}">
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