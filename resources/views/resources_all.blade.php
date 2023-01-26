<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources') }}
        </h2>
    </x-slot>

    <div style="padding-left: 160px; padding-top: 30px">
        
        @foreach( $data as $resource )

            <button class="resourceItem" onclick="location.href='{{$resource->url}}'">

                <b> <a style="font-size: 18px">{{ $resource->title  }} </a> </b>
        
            </button>

            <br>

        @endforeach

    </div>
</x-app-layout>
