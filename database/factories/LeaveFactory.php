<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->numberBetween(1, 3),
            'start_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'end_date' => $this->faker->dateTimeBetween('+3 months', '+4 months'),
            'cover_letter' => $this->faker->sentence
        ];
    }
}
