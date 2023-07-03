<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvertiserInfo>
 */
class AdvertiserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id'=> '',
            'bio'=> $this->faker->sentences(rand(30, 50)),
            'dob'=> $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'work_experience'=> 'Many',
            // 'category'=> '',
            'education'=> 'FUTO',
            'phone_number'=> [['number'=> $this->faker->phoneNumber()], ['number'=> $this->faker->phoneNumber()]],
            'portfolio_url'=> '',
            'religion'=> "Christian",
        ];
    }
}
