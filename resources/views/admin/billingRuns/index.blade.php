@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.billingRun.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Expense">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.staff') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.hours_used') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.hour_charges') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.total_amount') }}
                        </th>

                        <th>
                            {{ trans('cruds.billingRun.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.appointment_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.billingRun.fields.expense_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                    <tr data-entry-id="{{ $invoice->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $invoice->id ?? '' }}
                        </td>
                        <td>
                            <span class="badge badge-info">{{ $invoice->client->first_name }}</span>
                        </td>
                        <td>
                            @foreach($invoice->assigned_staffs as $key => $item)
                            <span class="badge badge-info">{{ $item->user->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $invoice->total_hours_consumed ?? '' }}
                        </td>
                        <td>
                            {{ $invoice->hour_charges ?? '' }}
                        </td>
                        <td>
                            {{ $invoice->total_amount ?? '' }}
                        </td>
                        <td>
                            {{ $invoice->status ?? '' }}
                        </td>
                        <td>
                            {{ $invoice->description ?? '' }}
                        </td>
                        <td>
                            @if(isset( $invoice->appointment))
                            {{ $invoice->appointment->start_time }}
                            @endif
                        </td>
                        <td>
                            {{ $invoice->expense->date ?? '' }}
                        </td>
                        <td>
                            @can('billing_run_show')
                            <a class="btn btn-xs btn-primary"
                                href="{{ route('admin.billing-runs.show', $invoice->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @if($invoice->status == 'in-progress')
                            @can('approve_invoice')
                            <form method="POST" action="{{route("admin.billing-runs.generateInvoice", [$invoice->
                                id])}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="total_amount" id="total_amount"
                                    value="{{ old('total_amount', $invoice->total_amount) }}">
                                <input type="hidden" name="total_hours_consumed" id="total_hours_consumed"
                                    value="{{ old('total_hours_consumed', $invoice->total_hours_consumed) }}">
                                <input type="hidden" name="hour_charges" id="hour_charges"
                                    value="{{ old('hour_charges', $invoice->hour_charges) }}">
                                <input type="hidden" name="description" id="description"
                                    value="{{ old('description', $invoice->description) }}">
                                <input type="hidden" name="status" id="status" value="invoice-generated">
                                <input type="hidden" name="client_id" id="client_id"
                                    value="{{ old('client_id', $invoice->client_id) }}">
                                <input type="hidden" name="expense_id" id="expense_id"
                                    value="{{ old('expense_id', $invoice->expense_id) }}">
                                <input type="hidden" name="appointment_id" id="appointment_id"
                                    value="{{ old('appointment_id', $invoice->appointment_id) }}">
                                <input class="btn btn-xs btn-warning" type="submit"
                                    value="{{ trans('cruds.billingRun.generate_invoice') }}">
                            </form>
                            @endcan
                            @can('billing_run_delete')
                            <form action="{{ route('admin.billing-runs.destroy', $invoice->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                            @endif

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('billing_run_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.billing-runs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
//
@can('multiple_approval_request')
  let invoiceButtonTrans = '{{ trans('cruds.billingRun.multiple_approval_request') }}'
  let invoiceButton = {
    text: invoiceButtonTrans,
    url: "{{ route('admin.billing-runs.multipleInvoiceApproval') }}",
    className: 'btn-warning',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'POST' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(invoiceButton)
@endcan
//

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Expense:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection


{{-- <div class="card">
    <div class="card-header">
        {{ trans('cruds.billingRun.title') }}
    </div>

    <div class="card-body">
        <p>
            Text coming soon...
        </p>
    </div>
</div> --}}
