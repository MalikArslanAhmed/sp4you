<?php

namespace App\Http\Requests;

use App\Models\CrmCustomer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_customer_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'phone_2' => [
                'string',
                'min:3',
                'max:30',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'min:0',
                'max:30',
                'nullable',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'postcode' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'state' => [
                'string',
                'min:0',
                'max:50',
                'nullable',
            ],
        ];
    }
}
