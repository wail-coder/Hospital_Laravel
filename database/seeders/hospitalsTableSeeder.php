<?php

namespace Database\Seeders;


use App\Models\Hospitals;
use Illuminate\Database\Seeder;

class hospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = [
            [
                'id'    => 1,
                'name' => 'Hospital_1',
            ],
            [
                'id'    => 2,
                'name' => 'Hospital_2',
            ],
            [
                'id'    => 3,
                'name' => 'Hospital_3',
            ],
        ];

        Hospitals::insert($hospitals);
    }
}
