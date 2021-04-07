<?php

namespace Database\Factories;

use App\Models\Design;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Design::class;

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

            'main_img' => 'designs/design.jpg',


            'desc' => json_encode([
                'en' => $this->faker->text(50),
                'ar' => $this->faker->text(50),
            ]),

            'price' => $this->faker->numberBetween(10, 100),

            'discount' => $this->faker->numberBetween(1, 50),

            'lang' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            'background' => 'designs/background.jpg',

            'font' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),
            'color' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            'details' => json_encode([
                'en' => $this->faker->text(50),
                'ar' => $this->faker->text(50),
            ]),
            'rate' => 0,
            

        ];
    }
}
