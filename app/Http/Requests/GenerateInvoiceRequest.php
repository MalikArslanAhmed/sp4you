<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class GenerateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('generate_invoice');
    }

    public function rules()
    {
        return [
        ];
    }
}
