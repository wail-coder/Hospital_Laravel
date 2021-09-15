<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Groups;
use App\Models\Users_Groups;
use Carbon\Carbon;

class usersGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersgroups = [
            [
                'users_id' => User::inRandomOrder()->first()->id,
                'groups_id' => Groups::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        Users_Groups::insert($usersgroups);

    }
}
