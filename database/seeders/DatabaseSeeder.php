<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\taka;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            "isAdmin" => false,
            "password" => "12345678",
            "customer_id" => "5445f"
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            "isAdmin" => true,
            "password" => "12345678",
            "customer_id" => "3345g"
        ]);
        
    }
}
