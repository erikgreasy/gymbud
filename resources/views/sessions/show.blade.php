<x-layouts.app>
    <div>
        <div class="flex items-center mb-5">
            @if($prevSession)
                <a
                    href="{{ route('sessions.show', ['session' => $prevSession]) }}"
                    class="w-10 h-10 inline-flex items-center justify-center bg-gray-400"
                    wire:navigate
                >
                    <
                </a>
            @endif

            <div class="flex-grow text-center">
                {{ $session->date->translatedFormat('l, d. M Y') }}
            </div>

            @if($nextSession)
                <a
                    href="{{ route('sessions.show', ['session' => $nextSession]) }}"
                    class="w-10 h-10 inline-flex items-center justify-center bg-gray-400"
                    wire:navigate
                >
                    >
                </a>
            @endif
        </div>

        <div class="mb-3">
            <x-button href="{{ route('sessions.exercises.index', ['session' => $session]) }}">
                Add record
            </x-button>
        </div>

        <x-records-table
            :title="$session->date"
            :records="$session->records"
        />
    </div>
</x-layouts.app>
