<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 170px; padding-right: 160px; padding-top: 30px">

        <h style="font-size: 22px;"> <b> Upload a File: </b> {{$data->title}} </h> <br> <br>

        <form class="formChunk" enctype="multipart/form-data" method='POST' action='/tasks/uploading/{{$data->id}}'>

            @csrf
            
            <input type="file" name="upload" id="upload">

            <button class="button" style="background-color: #2E5984" type='submit'> <b> Upload! </b> </button>

        </form>

        <br> <br>
        <button onclick="location.href='/tasks/view/{{$data->id}}'"> <b> Back </b> </button>

    </div>

</x-app-layout>

