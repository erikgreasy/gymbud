<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExercisesSeeder extends Seeder
{
    private ?User $user = null;

    private array $categoriesWithExercises = [
        'Chest' => [
            'Bench press',
            'Machine chest press',
        ],
        'Legs' => [
            'Squats',
            'RDLs',
            'Leg press',
            'Leg curl',
            'Laying leg curl',
        ],
        'Shoulders' => [
            'Overhead DB press',
            'Overhead barbell press',
            'Lateral raise',
        ],
        'Back' => [
            'Pull up',
            'Lat pull down',
            'Lat pull over',
            'Bentover row',
            'Bentover DB row',
        ],
    ];

    public function run(): void
    {
        $userId = $this->user?->id ?? User::first()->id;

        collect($this->categoriesWithExercises)
            ->each(function (array $exercises, string $categoryName) use ($userId) {
                $cat = Category::create([
                    'user_id' => $userId,
                    'name' => $categoryName
                ]);

                collect($exercises)
                    ->each(function (string $exerciseName) use ($cat) {
                        $cat->exercises()->create([
                            'name' => $exerciseName,
                        ]);
                    });
            });
    }

    public function forUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
