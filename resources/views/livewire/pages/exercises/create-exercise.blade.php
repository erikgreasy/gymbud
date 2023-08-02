<div>
    <form wire:submit="storeExercise">
        <div>
            <select wire:model="category_id">
                <option value="null" selected disabled>Choose category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label for="">
                Name:
                <input wire:model="name" type="text">
            </label>
        </div>

        <div>
            <x-button type="submit">Save</x-button>
        </div>
    </form>
</div>
