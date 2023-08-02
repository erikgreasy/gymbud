<div>
    <form wire:submit="updateRecord">
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
                <input wire:model="weight" type="number" step="any">
            </label>

            @error('weight')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label>
                Reps:
                <input wire:model="reps" type="text">
            </label>

            @error('reps')
            {{ $message }}
            @enderror
        </div>

        <div class="pt-5 grid grid-cols-2 gap-x-10">
            <a wire:navigate href="{{ route('sessions.show', ['session' => $session]) }}">Cancel</a>
            <button type="submit">Record</button>
        </div>
    </form>
</div>
