<x-layouts.app>
    <x-button :href="route('exercises.create')">
        New exercise
    </x-button>

    @foreach($exercises as $exercise)
        <article class="py-5">
            <a
                href="{{ route('exercises.edit', ['exercise' => $exercise]) }}"
                wire:navigate
            >
                {{ $exercise->name }}
            </a>
        </article>
    @endforeach
</x-layouts.app>
