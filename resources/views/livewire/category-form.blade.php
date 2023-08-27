<form wire:submit="submit">
    <div>
        <label for="">
            Name:
            <input wire:model="name" type="text">
        </label>
    </div>

    <div>
        <x-button type="submit" button>Save</x-button>
    </div>
</form>
