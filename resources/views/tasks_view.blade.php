<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 160px; padding-top: 30px">

        @if( !is_null($message) )
            <b> {{ $message }} </b>
            <br> <br>
        @endif

        {{ $data->title }}
        <br>
        {{ $data->description }}

        <br>
        @if( $data->completed )
            <p style="color:darkgreen;"> <b>COMPLETE</b> </p>
            Completed at: {{ $data->updated_at}}
        @else 
            <p style="color:darkred;"> <b>INCOMPLETE</b> </p>
        @endif

        <br> <br>
        <button onclick="location.href='/tasks/complete/{{$data->id}}'"> <b> 
            @if( $data->completed )
                Mark as Incomplete
            @else
                Mark as Complete
            @endif
        </b> </button>

        <br><br>
        <button onclick="location.href='/tasks'"> <b> Back </b> </button>
    </div>
</x-app-layout>
