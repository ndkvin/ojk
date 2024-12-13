<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB; // Query builder
use Illuminate\Support\Facades\Hash; // Untuk hash password
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@ojk.com',
                'password' => Hash::make('Sandi#123'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'superadmin',
            ]
        ]);
    }
}
