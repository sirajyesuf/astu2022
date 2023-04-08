<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class DeptGroupPhotoFactory extends Factory
{
   
    public function definition()
    {
        return [
            'images' =>  [
                $this->storeImage(),
                $this->storeImage()
            ],
            'department_id' => Department::factory()
        ];
    }

    public function storeImage(){

        $faker = Faker::create();

        $image = $faker->image(storage_path('app/public/students'),640, 480, null, false);

        return "students/".$image;

    }
}
