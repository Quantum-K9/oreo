<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 160px; padding-top: 30px">

        @if( !is_null($message) )
            <h class="notif"> <b> <h style="color: darkblue"> ⓘ </h> {{ $message }} </b> </h>
            <br> <br>
        @endif
        
        @foreach( $data as $task )
            <a href='/tasks/view/{{ $task->id }}' >{{ $task -> title }}</a>
            <br>
        @endforeach

        <br><br>
        <button> <a href="/tasks/create" > <b> New Task </b> </a> </button>

    </div>
</x-app-layout>
