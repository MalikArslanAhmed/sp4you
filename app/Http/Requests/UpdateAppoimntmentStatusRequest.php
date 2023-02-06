<?php

namespace App\Http\Requests;

use App\Models\AppoimntmentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppoimntmentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('appoimntment_status_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'min:3',
                'max:100',
                'required',
            ],
        ];
    }
}
