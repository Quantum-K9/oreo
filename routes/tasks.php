<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

// authenticate group
Route::middleware(['auth'])->group(function () {

    // view all route
    Route::get('/tasks', function(){
        return view('tasks_all', [ 'data' => Task::all() ]); // send data
    })->name('tasks');

    Route::get('/tasks/view/{task:id}', function( Task $task ){
        return view('tasks_view', [ 'data' => $task ] ); 
    });
});
