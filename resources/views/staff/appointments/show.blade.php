@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appointment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('staff.appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>
                        <td>
                            {{ $appointment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.clients') }}
                        </th>
                        <td>
                            @foreach($appointment->clients as $key => $clients)
                                <span class="label label-info">{{ $clients->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.assigned_staff') }}
                        </th>
                        <td>
                            @foreach($appointment->assigned_staffs as $key => $assigned_staff)
                                <span class="label label-info">{{ $assigned_staff->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.notes') }}
                        </th>
                        <td>
                            {{ $appointment->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.start_time') }}
                        </th>
                        <td>
                            {{ $appointment->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.end_time') }}
                        </th>
                        <td>
                            {{ $appointment->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.check_in') }}
                        </th>
                        <td>
                            {{ $appointment->check_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.check_out') }}
                        </th>
                        <td>
                            {{ $appointment->check_out }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.address') }}
                        </th>
                        <td>
                            {{ $appointment->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.city') }}
                        </th>
                        <td>
                            {{ $appointment->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.postcode') }}
                        </th>
                        <td>
                            {{ $appointment->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.state') }}
                        </th>
                        <td>
                            {{ $appointment->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.status') }}
                        </th>
                        <td>
                            {{ $appointment->status->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.billing_run') }}
                        </th>
                        <td>
                            {{ $appointment->billing_run }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.photos') }}
                        </th>
                        <td>
                            @foreach($appointment->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appointment.fields.documents') }}
                        </th>
                        <td>
                            @foreach($appointment->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('staff.appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#appointment_photos" role="tab" data-toggle="tab">
                {{ trans('cruds.photo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#appointment_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#appointment_invoices" role="tab" data-toggle="tab">
                {{ trans('cruds.invoice.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="appointment_photos">
            @includeIf('staff.appointments.relationships.appointmentPhotos', ['photos' => $appointment->appointmentPhotos])
        </div>
        <div class="tab-pane" role="tabpanel" id="appointment_expenses">
            @includeIf('staff.appointments.relationships.appointmentExpenses', ['expenses' => $appointment->appointmentExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="appointment_invoices">
            @includeIf('staff.appointments.relationships.appointmentInvoices', ['invoices' => $appointment->appointmentInvoices])
        </div>
    </div>
</div>

@endsection
