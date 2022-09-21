<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 160px; padding-top: 30px">
        @foreach( $data as $task )
            <a href='/tasks/view/{{ $task->id }}' >{{ $task -> title }}</a>
            <br>
        @endforeach
    </div>
</x-app-layout>
