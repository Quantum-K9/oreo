<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tasks\TaskController;

// authenticate group
Route::middleware(['auth'])->group(function () {

    // view all route
    Route::get('/tasks', function(){
        return view('tasks_all', [ 
        'data' => Task::orderBy('due_at')->get(), 
        'message' => null, 
        'timee' => now() ,
    ]); // send data
    })->name('tasks');

    // create new task route
    Route::get('/tasks/create', function(){
        return view('tasks_create');
    });

    //controller links
    Route::get('/tasks/view/{id}', [TaskController::class, 'show']);
    Route::get('/tasks/complete/{id}', [TaskController::class, 'complete']);
    Route::get('/tasks/delete/{id}', [TaskController::class, 'delete']);
    Route::post('/tasks/create/done', [TaskController::class, 'create']);
});
