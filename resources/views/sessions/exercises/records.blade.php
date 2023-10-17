<x-layouts.app>
    <x-exercise-header
        :exercise="$exercise"
        :session="$session"
    />

    <div class="divide-y">
        @foreach($exercise->prs as $pr)
            <div class="grid grid-cols-2 items-center py-3">
                <div>
                    {{ $pr->reps }}reps
                </div>
                <div>
                    {{ $pr->weight }}kgs<br>
                    <small>{{ $pr->session->date }}</small>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
