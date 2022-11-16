<link rel="stylesheet" href="{{ asset('css/globalstyles.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 170px; padding-right: 160px; padding-top: 30px">

        <b> <h style="font-size: 22px;"> Create a New Task: </h> </b> <br> <br>

        <form class="formChunk" method='POST' action='/tasks/create/done'>

            @csrf
            
            Task Name: <input type='string' name='name'> <br> <br>
            Task Description: <input type='text' name='desc'> <br> <br>
            Deadline: <input type='datetime-local' name='dead'> <br><br>

            <button class="button" style="background-color: #2E5984" type='submit'> <b> Create! </b> </button>

        </form>

        <br> <br>
        <button onclick="location.href='/tasks'"> <b> Back </b> </button>
    </div>
</x-app-layout>

