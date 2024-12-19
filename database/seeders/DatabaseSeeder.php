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
                'password' => Hash::make('Sandi#123'),
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
                'password' => Hash::make('Sandi#123'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'user',
            ]
        ]);

        // // Insert data into `functions`
        // $functions = [
        //     ['function' => 'Function A', 'created_at' => now(), 'updated_at' => now()],
        //     ['function' => 'Function B', 'created_at' => now(), 'updated_at' => now()],
        //     ['function' => 'Function C', 'created_at' => now(), 'updated_at' => now()],
        // ];
        // DB::table('functions')->insert($functions);

        // // Insert data into `types`
        // $functionIds = DB::table('functions')->pluck('id');
        // $types = [];
        // foreach ($functionIds as $functionId) {
        //     $types[] = ['function_id' => $functionId, 'type' => 'Type 1 of Function ' . $functionId, 'created_at' => now(), 'updated_at' => now()];
        //     $types[] = ['function_id' => $functionId, 'type' => 'Type 2 of Function ' . $functionId, 'created_at' => now(), 'updated_at' => now()];
        //     $types[] = ['function_id' => $functionId, 'type' => 'Type 3 of Function ' . $functionId, 'created_at' => now(), 'updated_at' => now()];
        // }
        // DB::table('types')->insert($types);

        // // Insert data into `bidang`
        // $typeIds = DB::table('types')->pluck('id');
        // $bidang = [];
        // foreach ($typeIds as $typeId) {
        //     $bidang[] = ['type_id' => $typeId, 'bidang' => 'Bidang 1 of Type ' . $typeId, 'created_at' => now(), 'updated_at' => now()];
        //     $bidang[] = ['type_id' => $typeId, 'bidang' => 'Bidang 2 of Type ' . $typeId, 'created_at' => now(), 'updated_at' => now()];
        //     $bidang[] = ['type_id' => $typeId, 'bidang' => 'Bidang 3 of Type ' . $typeId, 'created_at' => now(), 'updated_at' => now()];
        // }
        // DB::table('bidang')->insert($bidang);

        // // Insert data into `satuan_kerja`
        // $bidangIds = DB::table('bidang')->pluck('id');
        // $satker = [];
        // foreach ($bidangIds as $bidangId) {
        //     $satker[] = ['bidang_id' => $bidangId, 'satker' => 'Satker 1 of Bidang ' . $bidangId, 'created_at' => now(), 'updated_at' => now()];
        //     $satker[] = ['bidang_id' => $bidangId, 'satker' => 'Satker 2 of Bidang ' . $bidangId, 'created_at' => now(), 'updated_at' => now()];
        //     $satker[] = ['bidang_id' => $bidangId, 'satker' => 'Satker 3 of Bidang ' . $bidangId, 'created_at' => now(), 'updated_at' => now()];
        // }
        // DB::table('satuan_kerja')->insert($satker);
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
