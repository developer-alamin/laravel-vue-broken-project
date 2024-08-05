<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\User;
use App\Models\taka;

>>>>>>> 58891ab (file has been updated)
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======
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
        
>>>>>>> 58891ab (file has been updated)
    }
}
