<aside class="fixed bottom-0 w-full bg-gray-100 py-3">
    <nav class="container">
        <ul class="grid grid-cols-3 gap-5 justify-center">
            <x-mobile-nav-item route="home" :is-active="request()->routeIs('home')">
                <x-slot:icon>
                    <x-icons.home/>
                </x-slot:icon>
                Home
            </x-mobile-nav-item>

            <x-mobile-nav-item route="exercises.index" :is-active="request()->routeIs('exercises.*')">
                <x-slot:icon>
                    <svg
                        class="w-6 h-6 mx-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"/>
                    </svg>
                </x-slot:icon>
                Exercises
            </x-mobile-nav-item>

            <x-mobile-nav-item route="categories.index" :is-active="request()->routeIs('categories.*')">
                <x-slot:icon>
                    <svg
                        class="w-6 h-6 mx-auto"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9"/>
                    </svg>
                </x-slot:icon>
                Categories
            </x-mobile-nav-item>
        </ul>
    </nav>
</aside>
