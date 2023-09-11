<form wire:submit="submit">
    <div class="mb-4">
        <x-input-label>Exercise:</x-input-label>
        <x-select
            wire:model="exerciseId"
            wire:change="$dispatch('exercise-changed')"
            class="block w-full"
        >
            <option value="null" disabled>Choose exercise</option>

            @foreach($exercises as $exercise)
                <option value="{{ $exercise->id }}">
                    {{ $exercise->name }}
                </option>
            @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('exerciseId')"/>
    </div>

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
            Record
        </x-primary-button>

        <a href="{{ route('sessions.show', ['session' => $session]) }}" wire:navigate class="py-2 block text-center">
            Back
        </a>
    </div>

    <div class="mt-10">
        @foreach($exercisesSessions as $session)
            <div class="mb-5">
                {{ $session->date }}

                @foreach($session->records as $record)
                    @if($record->exercise_id == $this->exerciseId)
                        <div>
                            {{ $record->weight }}kg x {{ $record->reps }}
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</form>
