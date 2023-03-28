@extends('layouts.staff')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.clientTag.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("staff.client-tags.update", [$clientTag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tags">{{ trans('cruds.clientTag.fields.tags') }}</label>
                <input class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" type="text" name="tags" id="tags" value="{{ old('tags', $clientTag->tags) }}">
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clientTag.fields.tags_helper') }}</span>
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
