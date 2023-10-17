<x-layouts.app>
    <div class="space-y-10">
        <div class="flex justify-between items-start">
            <x-button href="{{ route('sessions.create') }}">
                New session
            </x-button>
        </div>

        @foreach($sessions as $session)
            <x-records-table
                :title="$session->date->format('d. M Y')"
                :title-link="route('sessions.show', ['session' => $session])"
                :records="$session->records"
            >
                <x-slot:titleActions>
                    <form
                        action="{{ route('sessions.destroy', ['session' => $session]) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button class="inline-flex items-center text-red-600">DEL &times;</button>
                    </form>
                </x-slot:titleActions>
            </x-records-table>
        @endforeach
    </div>
</x-layouts.app>
