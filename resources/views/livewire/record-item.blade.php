<tr wire:key="asd_{{ $record->id }}">
    <td class="p-2">
        <span class="inline-flex gap-x-2 items-center">
            {{ $record->exercise->name }}
            @if($record->is_pr)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                </svg>
            @endif
        </span>
    </td>
    <td class="p-2">{{ $record->weight }}kg</td>
    <td class="p-2">{{ $record->reps }}</td>
    <td class="p-2 flex gap-x-2">
        <a wire:navigate
           href="{{ route('sessions.records.edit', ['session' => $record->session, 'record' => $record]) }}">
            Edit
        </a>

        <form
            action="{{ route('sessions.records.destroy', ['session' => $record->session, 'record' => $record]) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>
    </td>
</tr>
