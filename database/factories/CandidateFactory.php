<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Jobs;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CandidateFactory extends Factory
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
            'job_id' => Jobs::factory(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'year' => 1999,
        ];
    }

    /**
     * seed skill table and skillset table
     *
     * @return static
     */
    public function configure()
    {
        return $this->afterCreating(function (Candidate $item) {
            $skill = Skill::factory()->count(2)->create()->pluck('id', 'id');
            $item->skills()->sync($skill);
        });
    }
}
