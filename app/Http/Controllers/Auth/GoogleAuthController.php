<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Database\Seeders\ExercisesSeeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();

        $user = \App\Models\User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'name' => $user->getName(),
                'password' => encrypt('Random?Password123.'),
                'locale' => 'en',
            ]
        );

        if ($user->wasRecentlyCreated) {
            (new ExercisesSeeder)->forUser($user)->run();
            event(new Registered($user));
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
