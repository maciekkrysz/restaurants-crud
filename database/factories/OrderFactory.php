<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::inRandomOrder()->first()->id,
            'paid' => $this->faker->boolean(),
            'confirmed' => $this->faker->boolean(),
            'sent' => $this->faker->boolean(),
            'delivered' => $this->faker->boolean(),
        ];
    }
}
