<div>
    <div class="mb-3">
        <x-button href="{{ route('records.create', ['session' => $session]) }}">
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
                    <tr wire:key="asd_{{ $record->id }}">
                        <td class="p-2">{{ $record->exercise->name }}</td>
                        <td class="p-2">{{ $record->weight }}kg</td>
                        <td class="p-2">{{ $record->reps }}</td>
                        <td class="p-2 flex gap-x-2">
                            <a wire:navigate
                               href="{{ route('records.edit', ['session' => $session, 'record' => $record]) }}">
                                Edit
                            </a>

                            <button wire:click="deleteRecord({{ $record->id }})" type="button">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </article>
</div>
