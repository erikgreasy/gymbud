<?php

use App\Livewire\Pages\Categories\CreateCategory;
use App\Livewire\Pages\Exercises\CreateExercise;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Records\CreateRecord;
use App\Livewire\Pages\Records\EditRecord;
use App\Livewire\Pages\Sessions\Create;
use App\Livewire\Pages\Sessions\Show;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::get('session/create', Create::class)->name('sessions.create');
    Route::get('session/{session}', Show::class)->name('sessions.show');

    Route::get('sessions/{session}/records/create', CreateRecord::class)->name('records.create');
    Route::get('sessions/{session}/records/{record}/edit', EditRecord::class)->name('records.edit');

    Route::get('categories/create', CreateCategory::class)->name('categories.create');

    Route::get('exercises/create', CreateExercise::class)->name('exercises.create');
});

require __DIR__ . '/auth.php';
