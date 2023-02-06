<?php

namespace App\Http\Requests;

use App\Models\LeaveApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeaveApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_application_create');
    }

    public function rules()
    {
        return [
            'staff_member_id' => [
                'required',
                'integer',
            ],
            'leave_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'leave_ends' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
