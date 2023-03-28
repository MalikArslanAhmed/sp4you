@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.leaveApproval.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LeaveApplication">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.staff_member') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.leave_ends') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.user_notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.approved') }}
                        </th>
                        <th>
                            {{ trans('cruds.leaveApproval.fields.admin_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveApplications as $key => $leaveApplication)
                    <tr data-entry-id="{{ $leaveApplication->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $leaveApplication->id ?? '' }}
                        </td>
                        <td>
                            {{ $leaveApplication->staff_member->name ?? '' }}
                        </td>
                        <td>
                            {{ $leaveApplication->leave_start ?? '' }}
                        </td>
                        <td>
                            {{ $leaveApplication->leave_ends ?? '' }}
                        </td>
                        <td>
                            {{ $leaveApplication->user_notes ?? '' }}
                        </td>
                        <td>
                            {{-- <span style="display:none">{{ $leaveApplication->approved ?? '' }}</span>
                            <input type="checkbox" disabled="disabled" {{ $leaveApplication->approved ? 'checked' : ''
                            }}> --}}
                            {{ $leaveApplication->approved ? 'Yes':'No' }}
                        </td>
                        <td>
                            {{ $leaveApplication->admin_notes ?? '' }}
                        </td>
                        <td>
                            @can('leave_application_show')
                            <a class="btn btn-xs btn-primary"
                                href="{{ route('admin.leave-approvals.show', $leaveApplication->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('leave_approval_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.leave-approvals.edit', $leaveApplication->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('leave_application_status')
                            <form method="POST" action="{{route("admin.leave-approvals.approved", [$leaveApplication->id])}}"  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="staff_member_id" id="staff_member_id" value="{{ old('staff_member_id', $leaveApplication->staff_member_id) }}">
                                <input type="hidden" name="leave_start" id="leave_start" value="{{ old('leave_start', $leaveApplication->leave_start) }}">
                                <input type="hidden" name="leave_ends" id="leave_ends" value="{{ old('leave_ends', $leaveApplication->leave_ends) }}">
                                <input type="hidden" name="notes" id="notes" value="asdfasdfasdfasd asdfasdf">
                                <input type="hidden" name="approved" id="approved" value="{{$leaveApplication->approved == 0 ? 1:0}}">
                                @if($leaveApplication->approved)
                                <input class="btn btn-xs btn-warning" type="submit" value="{{ trans('cruds.leaveApproval.reject') }}">
                                @else
                                <input class="btn btn-xs btn-info" type="submit"  value="{{  trans('cruds.leaveApproval.approve')  }}">
                                @endif
                            </form>
                            @endcan

                            @can('leave_application_delete')
                            <form action="{{ route('admin.leave-applications.destroy', $leaveApplication->id) }}"
                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
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
@can('leave_application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.leave-applications.massDestroy') }}",
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
  let table = $('.datatable-LeaveApplication:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
