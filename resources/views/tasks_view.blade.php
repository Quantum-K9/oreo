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
            <br> <br> <br>
        @endif

        <h1 style="font-size:20px"><b>{{ $data->title }}</b></h1>
        <br>
        {{ $data->description }}

        <br><br><br>
        <b>Due: {{ $data->due_at }} </b>

        <br>
        @if( $data->completed )
            <p style="color:darkgreen;"> <b>COMPLETE</b> </p>
            Completed at: {{ $data->submitted_at}}
        @else 
            <p style="color:darkred;"> <b>INCOMPLETE</b> </p>
        @endif

        <br> <br>
        <button class="button" style="background-color:darkcyan" onclick="location.href='/tasks/complete/{{$data->id}}'"> <b> 
            @if( $data->completed )
                Mark as Incomplete </h>
            @else
                Mark as Complete
            @endif
        </b> </button>

        <button class="button" style="background-color: darkred" onclick="location.href='/tasks/delete/{{$data->id}}'"><b>
            Delete Task
        </b></button>

        <br><br>
        <button onclick="location.href='/tasks'"> <b> Back </b> </button>
    </div>
</x-app-layout>
