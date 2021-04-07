<?php

namespace Database\Factories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competition::class;

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
            ]) ,
            'desc' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            'expired_at' => $this->faker->date('Y-m-d', '2021-3-30'),
        ];
    }
}
