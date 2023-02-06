@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.expense.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.expenses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $expense->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $expense->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.decscription') }}
                                    </th>
                                    <td>
                                        {{ $expense->decscription }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.receipt_photo') }}
                                    </th>
                                    <td>
                                        @if($expense->receipt_photo)
                                            <a href="{{ $expense->receipt_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $expense->receipt_photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $expense->client->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.appointment') }}
                                    </th>
                                    <td>
                                        {{ $expense->appointment->start_time ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.ammount') }}
                                    </th>
                                    <td>
                                        {{ $expense->ammount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.expense.fields.invoice_number') }}
                                    </th>
                                    <td>
                                        {{ $expense->invoice_number->invoice_number ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.expenses.index') }}">
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