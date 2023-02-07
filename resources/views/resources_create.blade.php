<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources') }}
        </h2>
    </x-slot>

    <div class="stdDiv">

        <b> <h style="font-size: 22px;"> Add a New Resource: </h> </b> <br> <br>

        <form class="formChunk" style='background-color: #d49adf' enctype="multipart/form-data" method='POST' action='/resources/create/done'>

            @csrf
            
            Resource Name: <input type='string' name='name'> <br> <br>
            
            Resource Type: 
            <input type="radio" name="type" value=true> File &nbsp;
            <input type="radio" name="type" value=false> Link <br> <br>

            Subject: <select name='subj'>
                @foreach( $subjs as $subj )
                    <option value={{$subj->id}}> {{$subj->name}} </option>
                @endforeach
            </select> <br> <br>

            Link: <input type='string' name='link'> <br> <br>

            <input type="file" name="upload" id="upload"> <br> <br>

            <button class="button" style="background-color: #9302ae" type='submit'> <b> Done! </b> </button>

        </form>

        <br> <br>
        <button onclick="location.href='/resources'"> <b> Back </b> </button>

    </div>
</x-app-layout>

