<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'created_by' => $this->faker->randomDigit(),
            'updated_by' => $this->faker->randomDigit(),
            'deleted_by' => $this->faker->randomDigit(),
        ];
    }
}
