<?php

namespace Database\Seeders;

use App\Models\Codes;
use Illuminate\Database\Seeder;

class codesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [
            [
                'id'    => 1,
                'name' => 'Red',
            ],
            [
                'id'    => 2,
                'name' => 'Yellow',
            ],
            [
                'id'    => 3,
                'name' => 'BLue',
            ],
            [
                'id'    => 4,
                'name' => 'Black',
            ],
            [
                'id'    => 5,
                'name' => 'White',
            ],
            [
                'id'    => 6,
                'name' => 'Green',
            ],
            [
                'id'    => 7,
                'name' => 'Pink',
            ],
            [
                'id'    => 8,
                'name' => 'Grey',
            ],
            [
                'id'    => 9,
                'name' => 'Orange',
            ],
            [
                'id'    => 10,
                'name' => 'Brown',
            ],
            [
                'id'    => 11,
                'name' => 'Covid_19',
            ],
        ];

        Codes::insert($codes);
    }
}
