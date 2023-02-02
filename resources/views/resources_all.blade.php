<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources') }}
        </h2>
    </x-slot>

    <div class="stdDiv">
        
        @foreach( $data as $resource )

            <!-- resource is an stored file -->
            @if ( $resource->resource_type ) 

                <button class="resourceItem" onclick="location.href='{{$resource->url}}'">

                    <a style="font-size: 15px"> File </a> <br>
                    <b> <a style="font-size: 18px">{{ $resource->title  }} </a> </b>
        
                </button>

            <!-- resource is an external link -->
            @else

                <button class="resourceItem" onclick="location.href='{{$resource->url}}'">

                    <a style="font-size: 15px"> Link </a> <br>
                    <b> <a style="font-size: 18px">{{ $resource->title  }} </a> </b>
        
                </button>

            @endif

            <br>


        @endforeach

        @can('create resource')
            <br><button class="button" style="background-color: green" onclick="location.href='/resources/create'">
                <b> Add Resource </b> 
            </button><br>
        @endcan

    </div>
</x-app-layout>
