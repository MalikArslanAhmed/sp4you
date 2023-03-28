@can('appointment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.appointments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-assignedStaffAppointments">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.clients') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.assigned_staff') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.check_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.check_out') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.postcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.billing_run') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.photos') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.documents') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $key => $appointment)
                        <tr data-entry-id="{{ $appointment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $appointment->id ?? '' }}
                            </td>
                            <td>
                                @foreach($appointment->clients as $key => $item)
                                    <span class="badge badge-info">{{ $item->first_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($appointment->assigned_staffs as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $appointment->notes ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->check_in ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->check_out ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->address ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->city ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->postcode ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->state ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->status->status ?? '' }}
                            </td>
                            <td>
                                {{ $appointment->billing_run ?? '' }}
                            </td>
                            <td>
                                @foreach($appointment->photos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($appointment->documents as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('appointment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.appointments.show', $appointment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('appointment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.appointments.edit', $appointment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('appointment_delete')
                                    <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('appointment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.appointments.massDestroy') }}",
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
  let table = $('.datatable-assignedStaffAppointments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection