<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

class DepartmentFactory extends Factory
{
    
    public function definition()
    {
        $long_name = $this->faker->name;

        return [
            'long_name'  => $long_name,
            'short_name' => strtoupper(substr($long_name,0,3)),
            'school_id'  => School::factory()
        ];
    }
}
