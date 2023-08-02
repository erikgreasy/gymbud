<div>
    <form wire:submit="storeRecord">
        <div>
            <label>
                Exercise:
                <select wire:model="exerciseId">
                    <option value="null" disabled>Choose exercise</option>

                    @foreach($exercises as $exercise)
                        <option value="{{ $exercise->id }}">
                            {{ $exercise->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            @error('exerciseId')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label for="">
                Weight:
                <input wire:model="weight" type="number" inputmode="numeric" step="any">
            </label>

            @error('weight')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label wire:model="reps" for="">
                Reps:
                <input type="number" inputmode="numeric">
            </label>

            @error('reps')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label for="">
                Comment:

                <input wire:model="comment" type="text">
            </label>
        </div>

        <div class="pt-5 grid grid-cols-2 gap-x-10">
            <x-button href="{{ route('sessions.show', ['session' => $session]) }}">
                Cancel
            </x-button>

            <x-button type="submit" button>
                Record
            </x-button>
        </div>
    </form>
</div>
