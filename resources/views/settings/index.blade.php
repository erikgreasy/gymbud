<x-layouts.app>
    <ul>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                
                <button type="submit">Logout</button>
            </form>
        </li>
    </ul>
</x-layouts.app>
