<x-layouts.app>
    <form action="" method="POST">
        @csrf

        <div class="mb-4">
            <x-select name="locale" class="block w-full">
                <option value="en" @selected($user->locale === 'en')>English</option>
                <option value="sk" @selected($user->locale === 'sk')>Slovenčina</option>
            </x-select>
        </div>

        <x-primary-button type="submit" class="w-full">Update locale</x-primary-button>
    </form>
</x-layouts.app>
