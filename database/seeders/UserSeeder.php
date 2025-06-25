<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a few specific users (optional)
        User::create([
            'name' => 'Admin User',
            'username' => 'admin_user',
            'email_verified_at' => now(),
            'status'    => 'active',
            'remember_token' => Str::random(10),
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Generate more random users
        User::factory(20)->create();
    }
}
