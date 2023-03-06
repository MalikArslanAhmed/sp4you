<?php

namespace App\Http\Requests;

use App\Models\CrmStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassGenerateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('generate_invoice'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:invoices,id',
        ];
    }
}
