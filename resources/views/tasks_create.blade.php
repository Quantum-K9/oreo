<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div style="padding-left: 160px; padding-top: 30px">
        
        New Task <br>

        temporary placeholder here

        <br> <br>
        <button onclick="location.href='/tasks'"> <b> Back </b> </button>
    </div>
</x-app-layout>
