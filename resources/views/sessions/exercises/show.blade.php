<x-layouts.app>
    <x-exercise-header
        :exercise="$exercise"
        :session="$session"
    />

    <livewire:record-form :exercise="$exercise" :session="$session"/>
</x-layouts.app>
