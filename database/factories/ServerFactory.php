<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'ip' => $this->faker->ipv4(),
            'port' => $this->faker->randomNumber(5),
            'bucket' => $this->faker->word(),
            'api_key' => $this->faker->word(),
        ];
    }
}
