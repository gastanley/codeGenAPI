<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // Importation du modèle User pour accéder aux utilisateurs existants

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodeGenModel>
 */
class CodeGenModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Récupérer tous les IDs des utilisateurs existants
        $userIds = User::pluck('id')->toArray();

        // Vérifier si la table users contient des utilisateurs
        if (empty($userIds)) {
            throw new \Exception('La table "users" est vide. Ajoutez des utilisateurs avant de générer des données pour "CodeGenModel".');
        }

        return [
            'nomSite' => $this->faker->randomElement([
                "facebook",
                "twitter",
                "myjob.mu",
                "gmail",
            ]),
            'codeGenerator' => $this->faker->randomElement([
                "#Tellar17",
            ]),
            // Sélectionner un user_id valide aléatoire depuis la table users
            'user_id' => $this->faker->randomElement($userIds), // Sélectionne un ID valide aléatoire
        ];
    }
}