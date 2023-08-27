<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleSettingsController extends Controller
{
    public function edit()
    {
        return view('settings.locale', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'locale' => ['required', 'string', 'in:sk,en']
        ]);

        auth()->user()->update([
            'locale' => $validated['locale']
        ]);

        return redirect()->route('settings.index');
    }
}
