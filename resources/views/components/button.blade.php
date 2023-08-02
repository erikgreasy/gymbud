@props([
    'button' => false,
])

@php $classes = 'bg-gray-200 text-center inline-block px-5 py-2' @endphp

@if($button)
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
