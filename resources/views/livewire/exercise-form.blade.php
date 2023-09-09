<form wire:submit="submit">
    <div class="mb-4">
        <x-input-label>Category:</x-input-label>
        <x-select wire:model="category_id" class="block w-full">
            <option value="null" selected disabled>Choose category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('category_id')"/>
    </div>

    <div class="mb-4">
        <x-input-label>Name:</x-input-label>
        <x-text-input wire:model="name" type="text" class="block w-full"/>
        <x-input-error :messages="$errors->get('name')"/>
    </div>

    <div>
        <x-primary-button class="w-full">Save</x-primary-button>
    </div>
</form>
