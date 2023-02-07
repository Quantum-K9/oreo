<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources') }}
        </h2>
    </x-slot>

    <div class="stdDiv">
        
        @foreach( $data as $resource )

            <div class="resourceItem">

                <a style="font-size: 15px"> 
                    <b>
                        @if( $resource->resource_type )
                            File
                        @else
                            Link
                        @endif

                        - 

                        {{ $resource->subject->name }}

                    </b>
                    
                </a> <br>
                    

                <table style="display:block">
                    <tr>

                        <td style="width:90%"> 
                            <b> <a style="font-size: 18px"> {{ $resource->title  }} </a> </b> 
                        </td>

                        <td style="width:10%;" align="left">

                            @can('delete resource')
                                <button class="button" style="background-color: darkred;" onclick="location.href='/deleteresource/{{ $resource->id }}'">
                                    <b> Delete Resource </b>
                                </button>
                            @endcan

                            @if( $resource->resource_type )
                                <button class="button" style="background-color:#80faab; color:black;" onclick="location.href='/viewfile/{{$resource->file_id}}'">

                                    <b> Download File </b>
                                </button>

                            @else
                                <button class="button" style="background-color:#80faab; color:black;" onclick="location.href='{{$resource->url}}'">

                                    <b> Follow Link </b>
                                </button>
                            
                            @endif

                        </td>

                    </tr>
                </table>
        
            </div>

            <br>

        @endforeach

        @can('create resource')
            <br><button class="button" style="background-color: green" onclick="location.href='/resources/create'">
                <b> Add Resource </b> 
            </button><br>
        @endcan

    </div>
</x-app-layout>
