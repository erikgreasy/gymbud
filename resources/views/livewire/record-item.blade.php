<tr wire:key="asd_{{ $record->id }}">
    <td class="p-2">{{ $record->exercise->name }}</td>
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
