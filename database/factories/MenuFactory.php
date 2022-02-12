<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US\Restaurant as a;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 4, 110),
        ];
    }
}
