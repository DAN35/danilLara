<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CheckIn;
use App\Models\Employee;
use App\Models\Server;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    final public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('12345678'),
         ]);

         Employee::factory(20)->create();
         Server::factory(10)->create();
         CheckIn::factory(90)->create();
    }
}
