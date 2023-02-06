<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('appointment_create');
    }

    public function rules()
    {
        return [
            'clients.*' => [
                'integer',
            ],
            'clients' => [
                'required',
                'array',
            ],
            'assigned_staffs.*' => [
                'integer',
            ],
            'assigned_staffs' => [
                'array',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'check_in' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'check_out' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'address' => [
                'string',
                'max:150',
                'nullable',
            ],
            'city' => [
                'string',
                'max:30',
                'nullable',
            ],
            'postcode' => [
                'string',
                'max:8',
                'nullable',
            ],
            'state' => [
                'string',
                'max:20',
                'nullable',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'photos' => [
                'array',
            ],
            'documents' => [
                'array',
            ],
        ];
    }
}
