<?php

namespace Database\Factories;

use App\Models\AdvertiserInfo;
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
        // $users = User::pluck('id')->toArray();

    return [
        'user_id' => 1,
        'bio' => $this->faker->paragraph,
        'dob' => $this->faker->date(),
        'work_experience' => null,
        'category' => $this->faker->word,
        'educational_status' => $this->faker->randomElement(['Bachelors', 'Masters', 'PhD']),
        'education' => null,
        'phone_number' => $this->faker->phoneNumber,
        'portfolio_url' => $this->faker->url,
        'religion' => $this->faker->randomElement(AdvertiserInfo::$religion),
        'state' => $this->faker->state,
        'min_price' => $this->faker->numberBetween(1000, 5000),
        'max_price' => $this->faker->numberBetween(5000, 10000),
        'lga_NG' => NULL,
        // Add more attributes as needed
    ];
    }
}
