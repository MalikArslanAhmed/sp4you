@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('staff_availability_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.staff-availabilities.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.staffAvailability.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.staffAvailability.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-StaffAvailability">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.staff_member') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.monday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.tuesday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.wednesday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.thursday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.friday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.saturday') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffAvailability.fields.sunday') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffAvailabilities as $key => $staffAvailability)
                                    <tr data-entry-id="{{ $staffAvailability->id }}">
                                        <td>
                                            {{ $staffAvailability->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->staff_member->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->monday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->tuesday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->wednesday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->thursday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->friday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->saturday ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffAvailability->sunday ?? '' }}
                                        </td>
                                        <td>
                                            @can('staff_availability_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.staff-availabilities.show', $staffAvailability->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('staff_availability_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.staff-availabilities.edit', $staffAvailability->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('staff_availability_delete')
                                                <form action="{{ route('frontend.staff-availabilities.destroy', $staffAvailability->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('staff_availability_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.staff-availabilities.massDestroy') }}",
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
  let table = $('.datatable-StaffAvailability:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection