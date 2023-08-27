<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class ExercisesSeeder extends Seeder
{
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
        collect($this->categoriesWithExercises)
            ->each(function (array $exercises, string $categoryName) {
                $cat = Category::create([
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
}
