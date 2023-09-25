<x-layouts.app>
    <ul class="space-y-5">
        <li>
            <a href="{{ route('settings.locale') }}" wire:navigate>
                {{ __('gymbud.settings.change_locale') }}
            </a>
        </li>
        <li>
            <a href="{{ route('settings.import') }}" wire:navigate>
                {{ __('gymbud.settings.import') }}
            </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="text-red-600">{{ __('gymbud.logout') }}</button>
            </form>
        </li>
    </ul>
</x-layouts.app>
