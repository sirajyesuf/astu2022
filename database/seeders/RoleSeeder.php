<?php

namespace Database\Seeders;

use BladeUI\Icons\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // DB::table('roles')->truncate();
        $roles = [
            [
                'short_name' => 'admin',
                'long_name' => 'admin',
            ],

            [
                'short_name' => 'editor',
                'long_name' => 'editor',
            ]

        ];

        DB::table('roles')->insert($roles);
    }
}
