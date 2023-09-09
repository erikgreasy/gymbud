<form wire:submit="submit" action="">
    <div class="mb-4">
        <x-text-input wire:model="date" type="date" class="w-full"/>
        <x-input-error :messages="$errors->get('date')"/>
    </div>

    <x-primary-button class="w-full">Start session</x-primary-button>
</form>
