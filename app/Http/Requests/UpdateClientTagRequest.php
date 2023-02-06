<?php

namespace App\Http\Requests;

use App\Models\ClientTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_tag_edit');
    }

    public function rules()
    {
        return [
            'tags' => [
                'string',
                'nullable',
            ],
        ];
    }
}
