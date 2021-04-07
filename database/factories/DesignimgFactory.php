<?php

namespace Database\Factories;

use App\Models\Designimg;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignimgFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Designimg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => 'designs/sub_design.jpg',
        ];
    }
}
