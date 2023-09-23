<x-layouts.app>
    <form action="{{ route('exercises.merge.store', ['exercise' => $exercise]) }}" class="text-center" method="POST">
        @csrf

        Merge
        <div class="font-bold text-xl">
            {{ $exercise->name }}
        </div>
        into
        <div class="mt-2">
            <x-select name="target_exercise_id">
                @foreach($exercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div>
            <x-primary-button class="my-5">Merge</x-primary-button>
        </div>

        <a href="{{ route('exercises.index') }}" wire:navigate>Cancel</a>
    </form>
</x-layouts.app>
