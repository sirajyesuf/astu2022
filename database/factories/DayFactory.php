<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class DayFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
