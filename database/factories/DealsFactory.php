<?php

namespace Database\Factories;

use App\Models\Deals;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deals>
 */
class DealsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        // $selected_features = [];
        $feature = (new Deals())->features;

        return [
            'title' => $this->faker->sentence(rand(6, 12)),
        'description' => $this->faker->sentence(rand(30, 90)),
        'features' => $this->faker->randomElement($feature),
        'price' => rand(5000, 300000),
        'delivery' => rand(1, 30),
        'type' => $this->faker->randomElement(['deal', 'option']),
        ];
    }
}
