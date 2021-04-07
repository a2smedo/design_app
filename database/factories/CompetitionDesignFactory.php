<?php

namespace Database\Factories;

use App\Models\CompetitionDesign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionDesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompetitionDesign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            'img' => 'competitions/cDesign.jpg',

            'desc' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            'rate' => 0
        ];
    }
}
