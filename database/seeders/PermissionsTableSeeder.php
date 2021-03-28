<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'SuperAdmin_access',
            ],
            [
                'id'    => 2,
                'title' => 'Admin_access',
            ],
            [
                'id'    => 3,
                'title' => 'task_access',
            ],
        ];

        Permissions::insert($permissions);
    }
}
