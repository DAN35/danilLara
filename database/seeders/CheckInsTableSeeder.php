<?php

namespace Database\Seeders;

use App\Models\CheckIn;
use Illuminate\Database\Seeder;

class CheckInsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CheckIn::factory(90)->create();
    }
}
