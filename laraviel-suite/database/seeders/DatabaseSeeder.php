<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name'=> 'Admin',
            'username'=> 'admin',
            'email'=> 'admin@example.com',
            'password' => Hash::make('password!'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name'=> 'Cashier',
            'username'=> 'cashier',
            'email'=> 'cashier@example.com',
            'password' => Hash::make('password!'),
            'role' => 'cashier',
        ]);
    }
}
