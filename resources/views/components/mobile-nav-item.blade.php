@props([
    'route',
    'isActive',
])

<li class="text-center text-sm {{ $isActive ? 'text-primary' : 'text-gray-500' }}">
    <a href="{{ route($route) }}" wire:navigate>
        {{ $icon }}

        {{ $slot }}
    </a>
</li>
