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
                            {{ $bill->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.client') }}
                        </th>
                        <td>
                            <span class="badge badge-info">{{ $bill->client->first_name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.staff') }}
                        </th>
                        <td>
                            <span class="badge badge-info">{{ $bill->user->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.ammount') }}
                        </th>
                        <td>
                            {{ $bill->amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.status') }}
                        </th>
                        <td>
                            {{ $bill->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.description') }}
                        </th>
                        <td>
                            {{ $bill->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.expense_date') }}
                        </th>
                        <td>
                            {{ $bill->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.billingRun.fields.appointment_date') }}
                        </th>
                        <td>
                            "{{ $bill->expense->appointment->start_time }}" to "{{ $bill->expense->appointment->end_time }}"
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
