<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Active',
                'created_at' => '2023-01-13 22:55:34',
                'updated_at' => '2023-01-13 22:55:34',
            ],
            [
                'id'         => 2,
                'name'       => 'Inactive',
                'created_at' => '2023-01-13 22:55:34',
                'updated_at' => '2023-01-13 22:55:34',
            ],
            [
                'id'         => 3,
                'name'       => 'Deceased',
                'created_at' => '2023-01-13 22:55:34',
                'updated_at' => '2023-01-13 22:55:34',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
