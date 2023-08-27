<form wire:submit="submit" action="">
    <div>
        <input wire:model="date" type="date">

        @error('date') <span class="block">{{ $message }}</span> @enderror
    </div>

    <x-button type="submit" button>Start session</x-button>
</form>
