<?php

namespace Database\Seeders;


use App\Models\Hospitals;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'location' => 'Al-Samer District',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 2,
                'name' => 'Hospital_2',
                'location' => 'Al-Safa District',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'    => 3,
                'name' => 'Hospital_3',
                'location' => 'Obhur District',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Hospitals::insert($hospitals);
    }
}
