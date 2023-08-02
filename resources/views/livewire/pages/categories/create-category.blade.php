<div>
    <form wire:submit="storeCategory">
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
