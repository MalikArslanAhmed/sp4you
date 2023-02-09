<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'profile_color'  => '',
            ],
            [
                'id'             => 2,
                'name'           => 'Nick',
                'email'          => 'info@totalterminals.com.au',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'profile_color'  => 'blue',
            ],
            [
                'id'             => 3,
                'name'           => 'Dane',
                'email'          => 'dane@totalterminals.com.au',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'profile_color'  => 'green',
            ],
        ];

        User::insert($users);
    }
}
