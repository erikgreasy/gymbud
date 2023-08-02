<?php

use App\Models\Category;
use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', function () {
    return Category::orderBy('name')->get();
});

Route::get('categories/{category}', function (Category $category) {
    return $category;
});

Route::put('categories/{category}', function (Request $request, Category $category) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255']
    ]);

    $category->update($validated);
});


Route::post('categories', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string']
    ]);

    return Category::create($validated);
});

Route::get('exercises', function () {
    return Exercise::orderBy('name')->get();
});

Route::post('exercises', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
    ]);

    return Exercise::create($validated);
});

Route::delete('exercises/{exercise}', function (Exercise $exercise) {
    $exercise->delete();
});

Route::get('exercises/{exercise}', function (Request $request, Exercise $exercise) {
    return $exercise->load(['records' => function ($query) use ($request) {
        if ($request->input('session')) {
            $query->where('session_id', $request->input('session'));
        }

        $query->latest();
        $query->with('session');
    }]);
});

Route::put('exercises/{exercise}', function (Request $request, Exercise $exercise) {
    $validated = $request->validate([
        'name' => ['required', 'string'],
        'category_id' => ['required', 'exists:categories,id']
    ]);

    return $exercise->update($validated);
});

Route::get('sessions', function () {
    return Session::orderByDesc('created_at')->get();
});

Route::get('sessions/{session}', function (Session $session) {
    return new \App\Http\Resources\SessionResource(
        $session->load('records')->load('records.exercise')
    );
});

Route::post('sessions', function (Request $request) {
    $validated = $request->validate([
        'date' => ['required', 'date']
    ]);

    return Session::create($validated);
});

Route::post('records', function (Request $request) {
    $validated = $request->validate([
        'session_id' => ['required', 'exists:sessions,id'],
        'exercise_id' => ['required', 'exists:exercises,id'],
        'weight' => ['required', 'numeric'],
        'reps' => ['required', 'integer'],
        'comment' => ['nullable', 'string'],
    ]);

    return Record::create($validated);
});

Route::delete('records/{record}', function (Record $record) {
    $record->delete();
});

Route::delete('sessions/{session}', function (Session $session) {
    $session->delete();
});
