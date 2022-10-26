<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'date' => $this->faker->date(),
            'describe' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
