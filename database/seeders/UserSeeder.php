<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeders\RoleSeeder;

use App\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $role_admin = Role::where('name', 'admin')->first();

        $role_user = Role::where('name', 'user')->first();

        $admin = new User;
        $admin->name = "Jack Lalor";
        $admin->email = "admin@caexample.com";
        $admin->password = "secret123";
        $admin->save();

        //attach admin role to the user created above
        $admin->roles()->attach($role_admin);

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

        // Create and attach roles to each user
        foreach ($users as $userData) {
            $user = new User;
            $user->fill($userData)->save();
            // Attach user role to each user
            $user->roles()->attach($role_user);
        }

        // Add more users as needed
        foreach ($users as $user) {
            // Check if the email already exists
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
    }
}
