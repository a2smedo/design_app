<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\CompetitionDesign;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Competition::factory()->has(
            CompetitionDesign::factory()->count(3)
        )->count(3)->create();
    }
}
