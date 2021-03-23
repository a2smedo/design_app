<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Design;
use App\Models\Designimg;
use App\Models\Rate;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::factory()->has(
            Design::factory()->has(
                Designimg::factory()->count(3)
            )->count(3)
        )->count(3)->create();
    }
}
