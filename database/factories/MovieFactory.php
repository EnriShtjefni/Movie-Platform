<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->words(rand(1, 10), true)), // fjale random si string, fillon me te madhe
            'description' => fake()->text(),
            'year' => fake()->year(),
            'status' => fake()->words(rand(1, 3), true),
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }
}
