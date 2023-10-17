<form wire:submit="submit">
    <div class="mb-4">
        <x-input-label>Weight:</x-input-label>

        <div class="flex items-center gap-x-3">
            <button
                x-on:click="$wire.weight -= 2"
                type="button"
                class="flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-md"
            >
                -
            </button>

            <x-text-input
                wire:model="weight"
                type="number"
                inputmode="decimal"
                step="any"
                class="flex-grow text-center"
            />

            <button
                x-on:click="$wire.weight = Number($wire.weight) + 2"
                type="button"
                class="flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-md"
            >
                +
            </button>
        </div>

        <x-input-error :messages="$errors->get('weight')"/>
    </div>

    <div class="mb-4">
        <x-input-label>Reps:</x-input-label>

        <div class="flex items-center gap-x-3">
            <button
                x-on:click="$wire.reps--"
                type="button"
                class="flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-md"
            >
                -
            </button>

            <x-text-input wire:model="reps" type="number" inputmode="numeric" class="flex-grow text-center"/>

            <button
                x-on:click="$wire.reps++"
                type="button"
                class="flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-md"
            >
                +
            </button>
        </div>

        <x-input-error :messages="$errors->get('reps')"/>
    </div>

    <div>
        <x-input-label>Comment:</x-input-label>
        <x-text-input wire:model="comment" type="text" class="block w-full"/>
    </div>

    <div class="pt-5">
        <x-primary-button class="w-full">
            @if($isEditing)
                Update
            @else
                Record
            @endif
        </x-primary-button>

        @if($isEditing)
            <button type="button" class="py-2 block w-full text-center" wire:click="cancelEditing">
                Cancel editing
            </button>
        @else
            <a href="{{ route('sessions.show', ['session' => $session]) }}" wire:navigate
               class="py-2 block text-center">
                Back
            </a>
        @endif
    </div>

    <div class="mt-10">
        @foreach($sessionRecords as $record)
            <div class="flex justify-between py-2">
                <div class="flex items-center gap-x-5">
                    {{ $record->weight }}kg x {{ $record->reps }}

                    @if($record->is_pr)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                        </svg>
                    @endif
                </div>
                <div class="space-x-4">
                    <button type="button" wire:click="editRecord({{ $record->id }})">Edit</button>
                    <button type="button" wire:click="deleteRecord({{ $record->id }})">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
</form>
