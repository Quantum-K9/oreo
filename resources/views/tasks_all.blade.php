<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 170px; padding-right: 160px; padding-top: 30px">

        @if( !is_null($message) )
            <h class="notif"> <b> <h style="color: darkblue"> ⓘ </h> {{ $message }} </b> </h>
            <br> <br>
        @endif
        
        @foreach( $data as $task )
            <button class="taskItem" onclick="location.href='/tasks/view/{{$task->id}}'">
                <b> <a style="font-size: 18px">{{ $task -> title }} </a> </b>
                <br>
                <i> {{$task->subject->name}} </i>

                <br><br>
                <i> Due: {{ $task->due_at }} </i>

                @if( $task->completed )
                    &nbsp; &nbsp; <b> <h style="color:#006400"> Done! </h> </b>
                @elseif( $timee > $task->due_at )
                    &nbsp; &nbsp; <b> <h style="color:#B90E0A"> Overdue! </h> </b>
                @endif

                <br>

            </button>
            <br>
        @endforeach

        <br>
        <button class="button" style="background-color: green" onclick="location.href='/tasks/create'">
            <b> New Task </b> 
        </button>

    </div>
</x-app-layout>
