<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; // Query builder
use Illuminate\Support\Facades\Hash; // Untuk hash password

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
                'name' => 'Superadmin',
                'email' => 'superadmin@ojk.com',
                'password' => Hash::make('sa123'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'superadmin',
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@ojk.com',
                'password' => Hash::make('Sandi#123'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin',
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@ojk.com',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'user',
            ]
        ]);

        DB::table('functions')->insert($this->generateRandomEntries('function', 10));

        // Seeder for Types
        DB::table('types')->insert($this->generateRandomEntries('type', 10));

        // Seeder for Satkers
        DB::table('satuan_kerja')->insert($this->generateRandomEntries('satker', 10));

        // Seeder for Bidangs
        DB::table('bidang')->insert($this->generateRandomEntries('bidang', 10));
    }
    private function generateRandomEntries($field, $count)
    {
        $entries = [];
        for ($i = 0; $i < $count; $i++) {
            $entries[] = [
                $field => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $entries;
    }
}
