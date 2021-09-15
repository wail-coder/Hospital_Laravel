<?php

namespace Database\Seeders;


use App\Models\Rooms;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Floors;


class roomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'id'    => 1,
                'number' => '1',
                'name' => 'Room_1',
                'floors_id' => Floors::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 2,
                'number' => '2',
                'name' => 'Room_2',
                'floors_id' => Floors::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 3,
                'number' => '3',
                'name' => 'Room_3',
                'floors_id' => Floors::inRandomOrder()->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Rooms::insert($rooms);
    }
}
