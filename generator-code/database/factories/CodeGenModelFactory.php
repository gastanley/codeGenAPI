<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'nomSite' =>$this->faker->randomElement([
                "facebook",
                "twitter",
                "myjob.mu",
                "gmail",
            ]),
            'codeGenerator' =>$this->faker->randomElement([
                "#Tellar17",
            ]),
        ];
    }
}
