@can('expense_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.expenses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.expense.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.expense.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-clientExpenses">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.decscription') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.receipt_photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.appointment') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.ammount') }}
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.bill') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expensesDetails as $key => $eDetail)
                        <tr data-entry-id="{{ $eDetail->expense->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $eDetail->expense->id ?? '' }}
                            </td>
                            <td>
                                {{ $eDetail->expense->date ?? '' }}
                            </td>
                            <td>
                                {{ $eDetail->expense->decscription ?? '' }}
                            </td>
                            <td>
                                @if($eDetail->expense->receipt_photo)
                                    <a href="{{ $eDetail->expense->receipt_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $eDetail->expense->receipt_photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($eDetail->expense->expenseDetails as $key => $item)
                                <span class="badge badge-info">{{ $item->client->first_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $eDetail->expense->appointment->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $eDetail->expense->ammount ?? '' }}
                            </td>
                            <td>
                                {{ $eDetail->expense->group_expense ? 'Yes':'No' }}
                            </td>
                            <td>
                                @can('expense_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.expenses.show', $eDetail->expense->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('expense_delete')
                                    <form action="{{ route('admin.expenses.destroy', $eDetail->expense->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('expense_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expenses.massDestroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-clientExpenses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
