<form wire:submit="submit">
    <div class="mb-4">
        <x-input-label>Name:</x-input-label>
        <x-text-input wire:model="name" type="text" class="block w-full"/>
        <x-input-error :messages="$errors->get('name')"/>
    </div>

    <div>
        <x-primary-button class="w-full">Save</x-primary-button>
    </div>
</form>
