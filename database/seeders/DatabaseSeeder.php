<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        //clear table users first
        
        DB::table('users')->delete();

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);

        // Insert the second user
        DB::table('users')->insert([
            'username' => 'tudor',
            'email' => 'tudor@tudor.com',
            'password' => Hash::make('tudor'),
            'role_id' => 0,
        ]);
    }
}
