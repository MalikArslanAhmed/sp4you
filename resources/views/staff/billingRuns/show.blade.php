@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.billingRun.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.billing-runs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.client') }}
                        </th>
                        <td>
                            <span class="badge badge-info">{{ $invoice->client->first_name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.staff') }}
                        </th>
                        <td>
                            @foreach($invoice->assigned_staffs as $key => $item)
                            <span class="badge badge-info">{{ $item->user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.hours_used') }}
                        </th>
                        <td>
                            {{ $invoice->total_hours_consumed ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.hour_charges') }}
                        </th>
                        <td>
                            {{ $invoice->hour_charges ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $invoice->total_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.status') }}
                        </th>
                        <td>
                            {{ $invoice->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.description') }}
                        </th>
                        <td>
                            {{ $invoice->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.expense_date') }}
                        </th>
                        <td>
                            {{ $invoice->expense->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.appointment_date') }}
                        </th>
                        <td>
                            {{ $invoice->appointment->start_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.billing-runs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
