<x-layouts.app>
    <x-button :href="route('categories.create')">
        New category
    </x-button>

    @foreach($categories as $category)
        <article class="py-5">
            <a href="{{ route('categories.edit', ['category' => $category]) }}" wire:navigate>
                {{ $category->name }}
            </a>
        </article>
    @endforeach
</x-layouts.app>
