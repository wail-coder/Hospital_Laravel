<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Buildings;
use Illuminate\Database\Seeder;
use App\Models\Hospitals;

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
                'number' => '1',
                'name' => 'Building_1',
                'hospitals_id' => Hospitals::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 2,
                'number' => '2',
                'name' => 'Building_2',
                'hospitals_id' => Hospitals::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 3,
                'number' => '3',
                'name' => 'Building_3',
                'hospitals_id' => Hospitals::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Buildings::insert($buildings);
    }
}
