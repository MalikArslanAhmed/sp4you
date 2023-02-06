<?php

namespace App\Http\Requests;

use App\Models\LeaveApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeaveApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_application_status');
    }

    public function rules()
    {
        return [
        ];
    }
}
