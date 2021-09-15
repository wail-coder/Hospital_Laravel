<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Codes;

class CodesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->codes()->sync(1);
        User::findOrFail(1)->codes()->sync(2);
        User::findOrFail(1)->codes()->sync(3);

        User::findOrFail(2)->codes()->sync(2);
        User::findOrFail(2)->codes()->sync(3);
        
        User::findOrFail(3)->codes()->sync(3);
        User::findOrFail(3)->codes()->sync(4);
        User::findOrFail(3)->codes()->sync(5);
    }
}
