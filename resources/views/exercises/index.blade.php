<x-layouts.app>
    <x-button :href="route('exercises.create')">
        New exercise
    </x-button>

    <table class="w-full">
        @foreach($exercises as $exercise)
            <tr>
                <td class="py-5 border-b">
                    {{ $exercise->name }}
                </td>
                <td class="border-b text-right">
                    <div class="flex justify-end gap-x-4">
                        <a
                            href="{{ route('exercises.edit', ['exercise' => $exercise]) }}"
                            wire:navigate
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                            </svg>
                        </a>

                        <a href="{{ route('exercises.merge', ['exercise' => $exercise]) }}" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="ml-auto w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"/>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</x-layouts.app>
