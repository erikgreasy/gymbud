<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SessionsController;
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
    Route::resource('sessions.records', RecordsController::class)->only(['create', 'edit', 'destroy']);
    Route::resource('categories', CategoriesController::class)->only(['create', 'index', 'edit']);
    Route::resource('exercises', ExercisesController::class)->only(['index', 'create', 'store', 'edit']);
});

require __DIR__ . '/auth.php';
