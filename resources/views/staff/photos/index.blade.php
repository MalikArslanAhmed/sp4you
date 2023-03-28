@extends('layouts.admin')
@section('content')
@can('photo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.photos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.photo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.photo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Photo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.photo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.photo.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.photo.fields.appointment') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.photo.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.photo.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $key => $photo)
                        <tr data-entry-id="{{ $photo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $photo->id ?? '' }}
                            </td>
                            <td>
                                {{ $photo->client->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $photo->client->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $photo->appointment->address ?? '' }}
                            </td>
                            <td>
                                {{ $photo->appointment->start_time ?? '' }}
                            </td>
                            <td>
                                @foreach($photo->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $photo->description ?? '' }}
                            </td>
                            <td>
                                @can('photo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.photos.show', $photo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('photo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.photos.edit', $photo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('photo_delete')
                                    <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('photo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.photos.massDestroy') }}",
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
  let table = $('.datatable-Photo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection