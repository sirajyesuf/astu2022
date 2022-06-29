<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::first();
        $user = [

            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('password'),
            'role_id' => $role->id

        ];
        DB::table('users')->insert($user);
    }
}
