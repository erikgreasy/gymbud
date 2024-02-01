<x-layouts.master>
    <x-app-header/>

    <div class="container py-10">
        {{ $slot }}
    </div>

    <x-mobile-nav/>

    {{--
        Manually include script, because auto include doesn't happen when no livewire component is on the page.
        That causes SPA with wire:navigate non working on some pages (pages that don't have livewire component in them),
        because no script is loaded to handle navigation.
    --}}
    @livewire('notifications')
</x-layouts.master>
