<?php

namespace App\Observers;

use App\Models\LeaveApplication;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class LeaveApplicationActionObserver
{
    public function created(LeaveApplication $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'LeaveApplication'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(LeaveApplication $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'LeaveApplication'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
