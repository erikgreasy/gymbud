<x-layouts.app>
    <form action="" method="POST">
        @csrf

        <select name="locale">
            <option value="en" @selected($user->locale === 'en')>English</option>
            <option value="sk" @selected($user->locale === 'sk')>Slovenčina</option>
        </select>

        <button type="submit">Update locale</button>
    </form>
</x-layouts.app>
