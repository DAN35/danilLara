<?php

namespace Database\Seeders;

use App\Models\CheckIn;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class CustomCheckInsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        CheckIn::factory(1)->create([
            'card_id' => '11 fA F5 C6 BF e2',
            'check' => $faker->dateTimeBetween('-2 days'),
        ]);
    }
}
