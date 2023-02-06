<?php

namespace App\Http\Requests;

use App\Models\ClientTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_tag_create');
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
