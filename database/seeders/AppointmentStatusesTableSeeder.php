<?php

namespace Database\Seeders;

use App\Models\AppoimntmentStatus;
use Illuminate\Database\Seeder;

class AppointmentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointment_status = [
            [
                'id'    => 1,
                'status' => 'Booked',
            ],
            [
                'id'    => 2,
                'status' => 'Completed',
            ],
            [
                'id'    => 3,
                'status' => 'Cancelled',
            ],
        ];

        AppoimntmentStatus::insert($appointment_status);
    }
}
