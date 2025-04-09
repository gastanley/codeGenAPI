<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Ajout de l'importation pour la classe Str

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Nom aléatoire
            'email' => $this->faker->unique()->safeEmail(), // Email unique aléatoire
            'email_verified_at' => now(), // Email vérifié à la date actuelle
            'password' => bcrypt('password'), // Mot de passe par défaut est "password"
            'remember_token' => Str::random(10), // Jeton aléatoire
        ];
    }
}