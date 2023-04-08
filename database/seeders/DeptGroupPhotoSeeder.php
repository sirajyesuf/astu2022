<?php

namespace Database\Seeders;

use App\Models\DeptGroupPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptGroupPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeptGroupPhoto::factory()->count(3)->create();
    }
}
