<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permissions::all();
        Roles::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'SuperAdmin_';
        });

        Roles::findOrFail(2)->permissions()->sync(2);
        Roles::findOrFail(3)->permissions()->sync(3);
    }
}
