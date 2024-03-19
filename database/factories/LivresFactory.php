<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livres>
 */
class LivresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre'=> fake()->sentence(),
            'isbn'=> fake()->ean8(),
            'annee_de_sortie'=> fake()->date(),
            'image' =>fake()->Imageurl(),
            'auteur_id'=> \App\Models\Auteur::factory(),
        ];
    }
}
