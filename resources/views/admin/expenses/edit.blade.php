@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.expense.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses.update", [$expense->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.expense.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $expense->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="decscription">{{ trans('cruds.expense.fields.decscription') }}</label>
                <input class="form-control {{ $errors->has('decscription') ? 'is-invalid' : '' }}" type="text" name="decscription" id="decscription" value="{{ old('decscription', $expense->decscription) }}">
                @if($errors->has('decscription'))
                    <div class="invalid-feedback">
                        {{ $errors->first('decscription') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.decscription_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="receipt_photo">{{ trans('cruds.expense.fields.receipt_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('receipt_photo') ? 'is-invalid' : '' }}" id="receipt_photo-dropzone">
                </div>
                @if($errors->has('receipt_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.receipt_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.expense.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $expense->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('group_expense') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="group_expense" value="0">
                    <input class="form-check-input" type="checkbox" name="group_expense" id="group_expense" value="1" {{ $expense->group_expense || old('group_expense', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="group_expense">{{ trans('cruds.expense.fields.group_expense') }}</label>
                </div>
                @if($errors->has('group_expense'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_expense') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.leaveApplication.fields.approved_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="appointment_id">{{ trans('cruds.expense.fields.appointment') }}</label>
                <select class="form-control select2 {{ $errors->has('appointment') ? 'is-invalid' : '' }}" name="appointment_id" id="appointment_id">
                    @foreach($appointments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('appointment_id') ? old('appointment_id') : $expense->appointment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('appointment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('appointment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.appointment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ammount">{{ trans('cruds.expense.fields.ammount') }}</label>
                <input class="form-control {{ $errors->has('ammount') ? 'is-invalid' : '' }}" type="number" name="ammount" id="ammount" value="{{ old('ammount', $expense->ammount) }}" step="0.01">
                @if($errors->has('ammount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ammount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.ammount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_id">{{ trans('cruds.expense.fields.bill') }}</label>
                <select class="form-control select2 {{ $errors->has('invoice') ? 'is-invalid' : '' }}" name="invoice_id" id="invoice_id">
                    @foreach($invoices as $id => $entry)
                        <option value="{{ $id }}" {{ (old('invoice_id') ? old('invoice_id') : $expense->bill->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.bill_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.receiptPhotoDropzone = {
    url: '{{ route('admin.expenses.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="receipt_photo"]').remove()
      $('form').append('<input type="hidden" name="receipt_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="receipt_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($expense) && $expense->receipt_photo)
      var file = {!! json_encode($expense->receipt_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="receipt_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection
