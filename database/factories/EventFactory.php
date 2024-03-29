<?php

namespace Database\Factories;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class EventFactory extends Factory
{
   
    public function definition()
    {
        return [
            'images' => [
                $this->storeImage(),
                $this->storeImage()
            ],
            'day_id' => Day::factory(),
            'order'  => $this->faker->numberBetween(1,20)
        ];
    }

    public function storeImage(){

        $faker = Faker::create();

        $image = $faker->image(storage_path('app/public/events'),640, 480, null, false);

        return "students/".$image;

    }
}
