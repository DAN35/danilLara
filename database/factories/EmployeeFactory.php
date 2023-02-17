<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cardPattern = '/^([0-9a-fA-F]{2} ){5}([0-9a-fA-F]{2})$/';
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'second_name' => $this->faker->firstName,
            'card_id' => $this->faker->regexify($cardPattern),
            'work_time_start' => '08:00:00',
            'work_time_end' => '18:00:00',
        ];
    }
}
