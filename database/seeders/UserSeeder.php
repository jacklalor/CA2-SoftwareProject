<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // Insert sample user data
        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'john@example.com',
        //     'password' => Hash::make('password'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // // Insert more sample user data
        // DB::table('users')->insert([
        //     'name' => 'Jane Doe',
        //     'email' => 'jane@example.com',
        //     'password' => Hash::make('password'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Alice Smith',
        //     'email' => 'alice@example.com',
        //     'password' => Hash::make('password'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $users = [
            [
                'name' => 'Example User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mark Wallace',
                'email' => 'mark@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Max Payne',
                'email' => 'max@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Craig Smith',
                'email' => 'craig@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dan Collins',
                'email' => 'dan@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Steven Cleary',
                'email' => 'steven@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users as needed
        ];

        // Add more users as needed
        foreach ($users as $user) {
            // Check if the email already exists
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
    }
}
