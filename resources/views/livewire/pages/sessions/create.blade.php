<div>
    <form wire:submit="startSession" action="">
        <div>
            <input wire:model="date" type="date">
            
            @error('date') <span class="block">{{ $message }}</span> @enderror
        </div>

        <x-button type="submit">Start session</x-button>
    </form>
</div>
