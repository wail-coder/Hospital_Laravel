<?php

namespace Database\Seeders;


use App\Models\Floors;
use Illuminate\Database\Seeder;

class floorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = [
            [
                'id'    => 1,
                'name' => 'Floor_1',
            ],
            [
                'id'    => 2,
                'name' => 'Floor_2',
            ],
            [
                'id'    => 3,
                'name' => 'Floor_3',
            ],
        ];

        Floors::insert($floors);
    }
}
