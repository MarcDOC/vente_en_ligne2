<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articleVente>
 */
class ArticleVenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'categorie' => fake()->name(),
            'prix' => fake()->numberBetween(100,10000),
            'user_id' => fake()->numberBetween(1,100),
            'photo' => 'IMG_0215.jpg',
            
        ];
    }
}
