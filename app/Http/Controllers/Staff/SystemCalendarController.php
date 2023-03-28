<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\CrmCustomer;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Appointment',
            'date_field' => 'start_time',
            'end_time'   => 'end_time',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'staff.appointments.edit',
        ],
        [
            'model'      => '\App\Models\LeaveApplication',
            'date_field' => 'leave_start',
            'leave_ends'   => 'leave_ends',
            'field'      => 'id',
            'prefix'     => 'User',
            'suffix'     => 'Leave',
            'route'      => 'staff.leave-applications.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {

            if ($source['model'] == "\App\Models\LeaveApplication") {
                foreach ($source['model']::all() as $model) {
                    $crudFieldValue = $model->getAttributes()[$source['date_field']];
                    $leaveEnd = $model->getAttributes()[$source['leave_ends']];
                    $staff = User::find($model->staff_member_id);
                    if (!$crudFieldValue) {
                        continue;
                    }


                    $events[] = [
                        'title' => $staff->name . ' ' . 'Leave',
                        'start' => $crudFieldValue,
                        'end'   => $leaveEnd,
                        'url'   => route($source['route'], $model),
                        'backgroundColor' => $staff->profile_color,
                    ];
                }
            }
            else {
                foreach ($source['model']::all() as $model) {
                    $crudFieldValue = $model->getAttributes()[$source['date_field']];
                    $endTime = $model->getAttributes()[$source['end_time']];
                    $clients = CrmCustomer::find($model->clients);
                    $assinged_staff = User::find($model->assigned_staff);
                    if (!$crudFieldValue) {
                        continue;
                    }
                    print_r($model);
                    $events[] = [
                        'title' => sprintf(
                            '%s %s %s',
                            trim($source['prefix']),
                            $clients[0]->first_name,
                            $clients[0]->last_name,
                            trim($source['suffix']),
                        ),

                        'start' => $crudFieldValue,
                        'end' => $endTime,
                        'backgroundColor' => $assinged_staff->profile_color,
                        'url'   => route($source['route'], $model),
                    ];
                }
            }
        }

        return view('staff.calendar.calendar', compact('events'));
    }
}

