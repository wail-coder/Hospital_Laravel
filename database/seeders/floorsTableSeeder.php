<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Floors;
use Illuminate\Database\Seeder;
use App\Models\Buildings;


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
                'number' => '1',
                'name' => 'Floor_1',
                'buildings_id' => Buildings::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 2,
                'number' => '2',
                'name' => 'Floor_2',
                'buildings_id' => Buildings::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 3,
                'number' => '3',
                'name' => 'Floor_3',
                'buildings_id' => Buildings::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Floors::insert($floors);
    }
}
