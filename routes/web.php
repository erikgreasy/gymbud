<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleSettingsController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SessionsController;
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
    Route::resource('sessions', SessionsController::class)->only(['show', 'create']);
    Route::resource('sessions.records', RecordsController::class)->only(['create', 'edit', 'destroy'])->scoped();
    Route::resource('categories', CategoriesController::class)->only(['create', 'index', 'edit']);
    Route::resource('exercises', ExercisesController::class)->only(['index', 'create', 'store', 'edit']);
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('settings/locale', [LocaleSettingsController::class, 'edit'])->name('settings.locale');
    Route::post('settings/locale', [LocaleSettingsController::class, 'update']);
});

require __DIR__ . '/auth.php';
