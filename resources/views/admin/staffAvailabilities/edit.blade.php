@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.staffAvailability.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.staff-availabilities.update", [$staffAvailability->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="staff_member_id">{{ trans('cruds.staffAvailability.fields.staff_member') }}</label>
                    <select class="form-control select2 {{ $errors->has('staff_member') ? 'is-invalid' : '' }}"
                        name="staff_member_id" id="staff_member_id">
                        @foreach($staff_members as $id => $entry)
                        <option value="{{ $id }}" {{ (old('staff_member_id') ? old('staff_member_id') :
                            $staffAvailability->staff_member->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('staff_member'))
                    <div class="invalid-feedback">
                        {{ $errors->first('staff_member') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.staff_member_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="monday_from">{{ trans('cruds.staffAvailability.fields.monday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('monday_from') ? 'is-invalid' : '' }}" type="text"
                        name="monday_from" id="monday_from" value="{{ old('monday_from', $staffAvailability->monday_from) }}">
                    @if($errors->has('monday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.monday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="monday_to">{{ trans('cruds.staffAvailability.fields.monday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('monday_to') ? 'is-invalid' : '' }}" type="text"
                        name="monday_to" id="monday_to" value="{{ old('monday_to', $staffAvailability->monday_to) }}">
                    @if($errors->has('monday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.monday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="tuesday_from">{{ trans('cruds.staffAvailability.fields.tuesday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('tuesday_from') ? 'is-invalid' : '' }}" type="text"
                        name="tuesday_from" id="tuesday_from" value="{{ old('tuesday_from', $staffAvailability->tuesday_from) }}">
                    @if($errors->has('tuesday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuesday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.tuesday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="tuesday_to">{{ trans('cruds.staffAvailability.fields.tuesday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('tuesday_to') ? 'is-invalid' : '' }}" type="text"
                        name="tuesday_to" id="tuesday_to" value="{{ old('tuesday_to', $staffAvailability->tuesday_to) }}">
                    @if($errors->has('tuesday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuesday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.tuesday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="wednesday_from">{{ trans('cruds.staffAvailability.fields.wednesday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('wednesday_from') ? 'is-invalid' : '' }}"
                        type="text" name="wednesday_from" id="wednesday_from"
                        value="{{ old('wednesday_from', $staffAvailability->wednesday_from) }}">
                    @if($errors->has('wednesday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wednesday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.wednesday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="wednesday_to">{{ trans('cruds.staffAvailability.fields.wednesday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('wednesday_to') ? 'is-invalid' : '' }}"
                        type="text" name="wednesday_to" id="wednesday_to"
                        value="{{ old('wednesday_to', $staffAvailability->wednesday_to) }}">
                    @if($errors->has('wednesday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wednesday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.wednesday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="thursday_from">{{ trans('cruds.staffAvailability.fields.thursday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('thursday_from') ? 'is-invalid' : '' }}"
                        type="text" name="thursday_from" id="thursday_from"
                        value="{{ old('thursday_from', $staffAvailability->thursday_from) }}">
                    @if($errors->has('thursday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thursday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.thursday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="thursday_to">{{ trans('cruds.staffAvailability.fields.thursday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('thursday_to') ? 'is-invalid' : '' }}"
                        type="text" name="thursday_to" id="thursday_to"
                        value="{{ old('thursday_to', $staffAvailability->thursday_to) }}">
                    @if($errors->has('thursday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thursday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.thursday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="friday_from">{{ trans('cruds.staffAvailability.fields.friday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('friday_from') ? 'is-invalid' : '' }}" type="text"
                        name="friday_from" id="friday_from" value="{{ old('friday_from', $staffAvailability->friday_from) }}">
                    @if($errors->has('friday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('friday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.friday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="friday_to">{{ trans('cruds.staffAvailability.fields.friday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('friday_to') ? 'is-invalid' : '' }}" type="text"
                        name="friday_to" id="friday_to" value="{{ old('friday_to', $staffAvailability->friday_to) }}">
                    @if($errors->has('friday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('friday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.friday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="saturday_from">{{ trans('cruds.staffAvailability.fields.saturday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('saturday_from') ? 'is-invalid' : '' }}"
                        type="text" name="saturday_from" id="saturday_from"
                        value="{{ old('saturday_from', $staffAvailability->saturday_from) }}">
                    @if($errors->has('saturday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('saturday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.saturday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="saturday_to">{{ trans('cruds.staffAvailability.fields.saturday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('saturday_to') ? 'is-invalid' : '' }}"
                        type="text" name="saturday_to" id="saturday_to"
                        value="{{ old('saturday_to', $staffAvailability->saturday_to) }}">
                    @if($errors->has('saturday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('saturday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.saturday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="sunday_from">{{ trans('cruds.staffAvailability.fields.sunday_from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('sunday_from') ? 'is-invalid' : '' }}" type="text"
                        name="sunday_from" id="sunday_from" value="{{ old('sunday_from', $staffAvailability->sunday_from) }}">
                    @if($errors->has('sunday_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sunday_from') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.sunday_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="sunday_to">{{ trans('cruds.staffAvailability.fields.sunday_to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('sunday_to') ? 'is-invalid' : '' }}" type="text"
                        name="sunday_to" id="sunday_to" value="{{ old('sunday_to', $staffAvailability->sunday_to) }}">
                    @if($errors->has('sunday_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sunday_to') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staffAvailability.fields.sunday_helper') }}</span>
                </div>
                <div class="form-group  col-md-12">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
