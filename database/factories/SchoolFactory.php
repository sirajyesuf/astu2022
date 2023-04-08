<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
  
    public function definition()
    {
    
        $long_name  = $this->faker->name;

        return [
            'short_name' => strtoupper(substr($long_name,0,3)),
            'long_name'  =>$long_name
        ];
    }
}
