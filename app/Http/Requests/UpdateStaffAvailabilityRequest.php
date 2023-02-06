<?php

namespace App\Http\Requests;

use App\Models\StaffAvailability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaffAvailabilityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staff_availability_edit');
    }

    public function rules()
    {
        return [
            'monday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'tuesday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'wednesday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'thursday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'friday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'saturday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'sunday' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
