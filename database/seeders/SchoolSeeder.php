<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'long_name' => "school of electrical enginnering and computing",
                "short_name" => "SOEEC"
            ],
            [
                'long_name' => "school of mechanical chemical material enginnering",
                'short_name' => "SOMCME"
            ],
            [
                'long_name' => "school of civil enginnering and architecture",
                'short_name' => "SOCEA"
            ],
            [
                'long_name' => "school of Applied and Science",
                'short_name' => "SOANS"
            ]
        ];
        DB::table('schools')->insert($schools);
    }
}
