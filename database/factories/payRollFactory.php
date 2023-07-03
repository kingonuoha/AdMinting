<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payRoll>
 */
class payRollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stats = (rand(1, 10) > rand(6, 10))? 'paid': 'pending';
        return [
       'amount' =>  rand(2000, 100000),
       'payment_status' => $stats
        ];
    }
}
