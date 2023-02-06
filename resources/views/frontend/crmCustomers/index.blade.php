@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('crm_customer_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.crm-customers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.crmCustomer.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.crmCustomer.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CrmCustomer">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.phone_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.postcode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.state') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.tags') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($crm_statuses as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($client_tags as $key => $item)
                                                <option value="{{ $item->tags }}">{{ $item->tags }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($crmCustomers as $key => $crmCustomer)
                                    <tr data-entry-id="{{ $crmCustomer->id }}">
                                        <td>
                                            {{ $crmCustomer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->phone_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->postcode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->state ?? '' }}
                                        </td>
                                        <td>
                                            {{ $crmCustomer->status->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($crmCustomer->tags as $key => $item)
                                                <span>{{ $item->tags }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('crm_customer_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.crm-customers.show', $crmCustomer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('crm_customer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.crm-customers.edit', $crmCustomer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('crm_customer_delete')
                                                <form action="{{ route('frontend.crm-customers.destroy', $crmCustomer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('crm_customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.crm-customers.massDestroy') }}",
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
  let table = $('.datatable-CrmCustomer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection