<?php

namespace Database\Seeders;


use App\Models\Buildings;
use Illuminate\Database\Seeder;

class buildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = [
            [
                'id'    => 1,
                'name' => 'Building_1',
            ],
            [
                'id'    => 2,
                'name' => 'Building_2',
            ],
            [
                'id'    => 3,
                'name' => 'Building_3',
            ],
        ];

        Buildings::insert($buildings);
    }
}
