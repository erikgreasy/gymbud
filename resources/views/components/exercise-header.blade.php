@props([
    'exercise',
    'session',
])

<div>
    <a
        href="{{ route('sessions.show', ['session' => $session]) }}"
        class="absolute left-0"
        wire:navigate
    >
        Back
    </a>
    <h2 class="font-bold text-2xl text-center mb-5">
        {{ $exercise->name }}
    </h2>
</div>

<div class="grid grid-cols-3 justify-items-center my-2 bg-gray-100">
    <a
        href="{{ route('sessions.exercises.show', ['session' => $session, 'exercise' => $exercise]) }}"
        class="py-4"
        wire:navigate
    >
        Track
    </a>

    <a
        href="{{ route('sessions.exercises.history', ['session' => $session, 'exercise' => $exercise]) }}"
        class="py-4"
        wire:navigate
    >
        History
    </a>

    <a
        href="{{ route('sessions.exercises.records', ['session' => $session, 'exercise' => $exercise]) }}"
        class="py-4"
        wire:navigate
    >
        PRs
    </a>
</div>
