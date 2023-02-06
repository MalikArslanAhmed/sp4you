@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.staffAvailability.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.staff-availabilities.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="staff_member_id">{{ trans('cruds.staffAvailability.fields.staff_member') }}</label>
                <select class="form-control select2 {{ $errors->has('staff_member') ? 'is-invalid' : '' }}" name="staff_member_id" id="staff_member_id">
                    @foreach($staff_members as $id => $entry)
                        <option value="{{ $id }}" {{ old('staff_member_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('staff_member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('staff_member') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.staff_member_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monday">{{ trans('cruds.staffAvailability.fields.monday') }}</label>
                <input class="form-control timepicker {{ $errors->has('monday') ? 'is-invalid' : '' }}" type="text" name="monday" id="monday" value="{{ old('monday') }}">
                @if($errors->has('monday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.monday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tuesday">{{ trans('cruds.staffAvailability.fields.tuesday') }}</label>
                <input class="form-control timepicker {{ $errors->has('tuesday') ? 'is-invalid' : '' }}" type="text" name="tuesday" id="tuesday" value="{{ old('tuesday') }}">
                @if($errors->has('tuesday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuesday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.tuesday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wednesday">{{ trans('cruds.staffAvailability.fields.wednesday') }}</label>
                <input class="form-control timepicker {{ $errors->has('wednesday') ? 'is-invalid' : '' }}" type="text" name="wednesday" id="wednesday" value="{{ old('wednesday') }}">
                @if($errors->has('wednesday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wednesday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.wednesday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thursday">{{ trans('cruds.staffAvailability.fields.thursday') }}</label>
                <input class="form-control timepicker {{ $errors->has('thursday') ? 'is-invalid' : '' }}" type="text" name="thursday" id="thursday" value="{{ old('thursday') }}">
                @if($errors->has('thursday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thursday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.thursday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="friday">{{ trans('cruds.staffAvailability.fields.friday') }}</label>
                <input class="form-control timepicker {{ $errors->has('friday') ? 'is-invalid' : '' }}" type="text" name="friday" id="friday" value="{{ old('friday') }}">
                @if($errors->has('friday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('friday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.friday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="saturday">{{ trans('cruds.staffAvailability.fields.saturday') }}</label>
                <input class="form-control timepicker {{ $errors->has('saturday') ? 'is-invalid' : '' }}" type="text" name="saturday" id="saturday" value="{{ old('saturday') }}">
                @if($errors->has('saturday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('saturday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.saturday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sunday">{{ trans('cruds.staffAvailability.fields.sunday') }}</label>
                <input class="form-control timepicker {{ $errors->has('sunday') ? 'is-invalid' : '' }}" type="text" name="sunday" id="sunday" value="{{ old('sunday') }}">
                @if($errors->has('sunday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sunday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffAvailability.fields.sunday_helper') }}</span>
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