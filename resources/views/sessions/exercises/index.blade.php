<x-layouts.app>
    <div class="divide-y">
        @foreach($exercises as $exercise)
            <a
                href="{{ route('sessions.exercises.show', ['session' => $session, 'exercise' => $exercise]) }}"
                class="block py-3"
            >
                {{ $exercise->name }}
            </a>
        @endforeach
    </div>
</x-layouts.app>
