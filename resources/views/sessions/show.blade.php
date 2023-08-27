<x-layouts.app>
    <div>
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
