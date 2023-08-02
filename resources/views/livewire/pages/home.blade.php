<div class="space-y-10">
    <div class="flex justify-between items-start">
        <x-button href="{{ route('sessions.create') }}">
            New session
        </x-button>

        <div class="flex flex-col gap-4 items-end">
            <x-button href="{{ route('exercises.create') }}">
                New exercise
            </x-button>

            <x-button href="{{ route('categories.create') }}">
                New category
            </x-button>
        </div>
    </div>

    @foreach($this->sessions as $session)
        <article class="border border-gray-400">
            <header class="bg-gray-200">
                <a wire:navigate href="{{ route('sessions.show', ['session' => $session]) }}" class="block p-2">
                    {{ $session->date->format('d. M Y') }}
                </a>
            </header>

            <main>
                <ul>
                    @foreach($session->records as $record)
                        <li class="p-2 grid grid-cols-3 gap-x-4">
                            <span>
                                {{ $record->exercise->name }}
                            </span>

                            <span>
                                {{ $record->weight }}kg
                            </span>

                            <span>
                                {{ $record->reps }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </main>
        </article>
    @endforeach
</div>
