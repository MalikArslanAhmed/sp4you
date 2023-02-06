@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.clients') }}
                        </th>
                        <td>
                            @foreach($invoice->clients as $key => $clients)
                                <span class="label label-info">{{ $clients->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.appointment') }}
                        </th>
                        <td>
                            @foreach($invoice->appointments as $key => $appointment)
                                <span class="label label-info">{{ $appointment->start_time }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.xero_invoice') }}
                        </th>
                        <td>
                            {{ $invoice->xero_invoice }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection