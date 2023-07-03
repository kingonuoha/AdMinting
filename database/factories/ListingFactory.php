<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd();
        $content= '';
        
        for ($i=0; $i < 5; $i++) { 
            $content .= '<p class="mb-4">'.$this->faker->sentence(rand(5, 11), true).'</p>';
        }
        $title = $this->faker->sentence(rand(6, 12));
        $datetime = $this->faker->dateTimeBetween('-3 month', 'now');
        return [
            'title'=> $title,
            'slug'=> Str::slug($title).'-'.rand(1111, 9999),
            'location'=> DB::table('states')->where('id', rand(1, 37))->first()->state,
            'logo'=>basename($this->faker->image(storage_path('app/public/company_logo'))),
            'is_highlighted'=> (rand(1, 9) > 7),
            'is_active'=> true,
            'content'=> $content,
            'apply_link'=> $this->faker->url,
            'created_at'=> $datetime,
            'updated_at'=> $datetime,
        ];
    }
}
