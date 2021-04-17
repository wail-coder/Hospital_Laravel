<?php

namespace Database\Seeders;


use App\Models\Rooms;
use Illuminate\Database\Seeder;

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
                'name' => 'Room_1',
            ],
            [
                'id'    => 2,
                'name' => 'Room_2',
            ],
            [
                'id'    => 3,
                'name' => 'Room_3',
            ],
        ];

        Rooms::insert($rooms);
    }
}
