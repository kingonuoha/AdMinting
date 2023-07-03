<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrandInfo>
 */
class BrandInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_name'=> $this->faker->company(),
            'position'=> 'Teacher',
            'logo_path'=> basename($this->faker->image(storage_path('app/public/company_logo'))),
            'phone_number'=> [['number'=> $this->faker->phoneNumber()], ['number'=> $this->faker->phoneNumber()]],
            // 'category'=> '',
            'brand_email'=> $this->faker->companyEmail,
            'description'=> $this->faker->sentence(rand(12, 15), rand(40, 70)),
            'short_desc'=> $this->faker->sentence(rand(5, 8), rand(20, 30)),
            'location'=> $this->faker->streetAddress,
        ];
    }
}
