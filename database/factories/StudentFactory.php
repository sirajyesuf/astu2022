<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Department;
use App\Models\Image;
use App\Models\Student;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'student_id' => $this->faker->numberBetween(10000-99999),
            'last_word'  => $this->faker->word(),
            'user_id'    => User::factory(),
            'department_id' => Department::factory(),
            'images' => [

                $this->storeImage(),
                $this->storeImage(),

            ],
            'gown_image' => $this->storeImage()
        ];
    }


    public function storeImage(){

        $faker = Faker::create();

        $image = $faker->image(storage_path('app/public/students'),640, 480, null, false);

        return "students/".$image;

    }
}
