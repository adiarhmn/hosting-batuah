<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $roles = [
            ['name' => 'admin'],
            ['name' => 'user'],
        ];

        DB::table('roles')->insert($roles);

        // Users
        $users = [
            [
                'name' => 'Batuah Admin',
                'role_id' => 1, // Admin role
                'email' => 'adminbatuah@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. Admin Batuah No. 1',
                'email_verified_at' => now(),
                'password' => bcrypt('hostingbts88'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
