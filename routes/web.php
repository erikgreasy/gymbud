<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExerciseMergeController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportSettingsController;
use App\Http\Controllers\LocaleSettingsController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SessionExerciseHistoryController;
use App\Http\Controllers\SessionExercisePrsController;
use App\Http\Controllers\SessionListExercisesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SessionShowExerciseController;
use App\Http\Controllers\SettingsController;
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
    Route::get('/', HomeController::class)->name('home');
    Route::resource('sessions', SessionsController::class)->only(['show', 'create', 'destroy']);
    Route::resource('sessions.records', RecordsController::class)->only(['create', 'edit', 'destroy'])->scoped();

    Route::get('sessions/{session}/exercises', SessionListExercisesController::class)->name('sessions.exercises.index');
    Route::get('sessions/{session}/exercises/{exercise}', SessionShowExerciseController::class)->name('sessions.exercises.show');
    Route::get('sessions/{session}/exercises/{exercise}/records', SessionExercisePrsController::class)->name('sessions.exercises.records');
    Route::get('sessions/{session}/exercises/{exercise}/history', SessionExerciseHistoryController::class)->name('sessions.exercises.history');

    Route::resource('categories', CategoriesController::class)->only(['create', 'index', 'edit']);
    Route::resource('exercises', ExercisesController::class)->only(['index', 'create', 'store', 'edit']);
    Route::get('exercises/{exercise}/merge', [ExerciseMergeController::class, 'create'])->name('exercises.merge');
    Route::post('exercises/{exercise}/merge', [ExerciseMergeController::class, 'store'])->name('exercises.merge.store');

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('settings/locale', [LocaleSettingsController::class, 'edit'])->name('settings.locale');
    Route::post('settings/locale', [LocaleSettingsController::class, 'update']);
    Route::get('settings/import', [ImportSettingsController::class, 'edit'])->name('settings.import');
    Route::post('settings/import', [ImportSettingsController::class, 'update']);
});

require __DIR__ . '/auth.php';
