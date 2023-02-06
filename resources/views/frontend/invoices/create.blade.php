@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoices.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="clients">{{ trans('cruds.invoice.fields.clients') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="clients[]" id="clients" multiple>
                                @foreach($clients as $id => $client)
                                    <option value="{{ $id }}" {{ in_array($id, old('clients', [])) ? 'selected' : '' }}>{{ $client }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('clients'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clients') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.clients_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="appointments">{{ trans('cruds.invoice.fields.appointment') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="appointments[]" id="appointments" multiple>
                                @foreach($appointments as $id => $appointment)
                                    <option value="{{ $id }}" {{ in_array($id, old('appointments', [])) ? 'selected' : '' }}>{{ $appointment }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('appointments'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('appointments') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.appointment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection