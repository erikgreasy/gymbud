<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exercise_id' => Exercise::factory(),
            'session_id' => Session::factory(),
            'reps' => $this->faker->numberBetween(4, 16),
            'weight' => $this->faker->numberBetween(10, 100),
        ];
    }
}
