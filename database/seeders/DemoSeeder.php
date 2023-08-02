<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    private $categories = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this
            ->createCategories()
            ->createExercises();
    }

    private function createCategories(): self
    {
        $categories = [
            'chest',
            'back',
            'shoulders',
            'legs',
            'biceps',
            'triceps',
        ];

        collect($categories)
            ->each(function (string $categoryName) {
                $category = Category::create(['name' => $categoryName]);
                $this->categories[$categoryName] = $category;
            });

        return $this;
    }

    private function createExercises(): self
    {
        $this->categories['chest']->exercises()->create([
            'name' => 'Bench press',
        ]);

        return $this;
    }
}
