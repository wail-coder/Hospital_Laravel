<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super_Admin',
                'job_title'           => 'IT',
                'email'          => 'SuperAdmin@SuperAdmin.com',
                'password'       => bcrypt('password'),
                'password_status' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'             => 2,
                'name'           => 'Admin',
                'job_title'           => 'Head Department',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'password_status' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'             => 3,
                'name'           => 'User',
                'job_title'           => 'Head Nurse',
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),
                'password_status' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'             => 4,
                'name'           => 'Nurse',
                'job_title'           => 'Nurse',
                'email'          => 'nurse@nurse.com',
                'password'       => bcrypt('password'),
                'password_status' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($users);
    }
}
