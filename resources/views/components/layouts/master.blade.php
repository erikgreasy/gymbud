<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gymbud</title>

    <link rel="manifest" href="manifest.webmanifest"/>
    <!-- ios support -->
    <link rel="apple-touch-icon" href="/icon-192x192.png"/>
    <link rel="apple-touch-icon" href="/icon-256x256.png"/>
    <link rel="apple-touch-icon" href="/icon-512x512.png"/>
    <meta name="apple-mobile-web-app-status-bar" content="#8b5cf6"/>
    <meta name="theme-color" content="#8b5cf6"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--
        Manually include style, because auto include doesn't happen when no livewire component is on the page.
        That causes SPA with wire:navigate non working on some pages (pages that don't have livewire component in them),
        because no script is loaded to handle navigation.
    --}}
    @filamentStyles
    @livewireStyles
</head>
<body class="pb-20">
    {{ $slot }}

    @filamentScripts
    @livewireScripts
</body>
</html>
