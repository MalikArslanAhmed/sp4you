<?php

namespace App\Listeners;

use App\Events\AppointmentDelete;
use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteInvoicesAgainstAppointment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AppointmentDelete  $event
     * @return void
     */
    public function handle(Appointment $event)
    {
        //
    }
}
