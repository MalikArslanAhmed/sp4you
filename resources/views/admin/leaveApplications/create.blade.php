@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.leaveApplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leave-applications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="staff_member_id">{{ trans('cruds.leaveApplication.fields.staff_member') }}</label>
                <select  @disabled(!auth()->user()->is_admin) class="form-control select2 {{ $errors->has('staff_member') ? 'is-invalid' : '' }}" name="staff_member_id" id="staff_member_id" required>
                    @foreach($staff_members as $id => $entry)
                        <option value="{{ $id }}" {{ old('staff_member_id') == $id || (!auth()->user()->is_admin && $id == auth()->user()->id) ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if(!auth()->user()->is_admin)
                    <input hidden type="text" name="staff_member_id" id="staff_member_id" value="{{ auth()->user()->id }}">
                @endif
                @if($errors->has('staff_member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('staff_member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.staff_member_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leave_start">{{ trans('cruds.leaveApplication.fields.leave_start') }}</label>
                <input class="form-control date {{ $errors->has('leave_start') ? 'is-invalid' : '' }}" type="text" name="leave_start" id="leave_start" value="{{ old('leave_start') }}" required>
                @if($errors->has('leave_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.leave_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leave_ends">{{ trans('cruds.leaveApplication.fields.leave_ends') }}</label>
                <input class="form-control date {{ $errors->has('leave_ends') ? 'is-invalid' : '' }}" type="text" name="leave_ends" id="leave_ends" value="{{ old('leave_ends') }}" required>
                @if($errors->has('leave_ends'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_ends') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.leave_ends_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_notes">{{ trans('cruds.leaveApproval.fields.user_notes') }}</label>
                <textarea class="form-control {{ $errors->has('user_notes') ? 'is-invalid' : '' }}" name="user_notes" id="user_notes">{{ old('user_notes') }}</textarea>
                @if($errors->has('user_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
