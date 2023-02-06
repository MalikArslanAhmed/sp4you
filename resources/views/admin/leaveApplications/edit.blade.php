@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.leaveApplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leave-applications.update", [$leaveApplication->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="staff_member_id">{{ trans('cruds.leaveApplication.fields.staff_member') }}</label>
                <select class="form-control select2 {{ $errors->has('staff_member') ? 'is-invalid' : '' }}" name="staff_member_id" id="staff_member_id" required>
                    @foreach($staff_members as $id => $entry)
                        <option value="{{ $id }}" {{ (old('staff_member_id') ? old('staff_member_id') : $leaveApplication->staff_member->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('staff_member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('staff_member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.staff_member_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leave_start">{{ trans('cruds.leaveApplication.fields.leave_start') }}</label>
                <input class="form-control date {{ $errors->has('leave_start') ? 'is-invalid' : '' }}" type="text" name="leave_start" id="leave_start" value="{{ old('leave_start', $leaveApplication->leave_start) }}" required>
                @if($errors->has('leave_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.leave_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leave_ends">{{ trans('cruds.leaveApplication.fields.leave_ends') }}</label>
                <input class="form-control date {{ $errors->has('leave_ends') ? 'is-invalid' : '' }}" type="text" name="leave_ends" id="leave_ends" value="{{ old('leave_ends', $leaveApplication->leave_ends) }}" required>
                @if($errors->has('leave_ends'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_ends') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.leave_ends_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.leaveApplication.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $leaveApplication->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="approved" value="0">
                    <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1" {{ $leaveApplication->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="approved">{{ trans('cruds.leaveApplication.fields.approved') }}</label>
                </div>
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.approved_helper') }}</span>
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