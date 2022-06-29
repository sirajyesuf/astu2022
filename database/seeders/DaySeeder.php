<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'name' => 'Half Life'
            ],
            [
                'name' => '100th day'
            ],
            [
                'name' => '50th day'
            ],
            [
                'name' => 'Color Day'
            ],
            [
                'name' => 'Last Final Exam day'
            ],
            [
                'name' => 'GC Cup'
            ],
            [
                'name' => 'Defense'
            ]
        ];

        DB::table('days')->insert($days);
    }
}
