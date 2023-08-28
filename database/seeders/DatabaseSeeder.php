<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Erik Masny',
            'email' => 'erik@greasy.dev',
            'locale' => 'en',
            'password' => bcrypt('password'),
        ]);

        $this->call(ExercisesSeeder::class);

        $exercises = Exercise::all();

        $sessions = Session::factory(20)
            ->for($user)
            ->has(
                Record::factory(12)->state(fn () => ['exercise_id' => $exercises->random()->id])
            )
            ->create();
    }
}
