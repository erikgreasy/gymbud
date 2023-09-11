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
            <x-button href="{{ route('sessions.records.create', ['session' => $session]) }}">
                Add record
            </x-button>
        </div>

        <article class="border border-gray-400">
            <header class="bg-gray-200 p-2">
                {{ $session->date }}
            </header>

            <main>
                <table class="w-full">
                    @foreach($session->records as $record)
                        <livewire:record-item :record="$record"/>
                    @endforeach
                </table>
            </main>
        </article>
    </div>
</x-layouts.app>
