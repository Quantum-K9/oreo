<?php

use Illuminate\Support\Facades\Route;

use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

// route group that requires auth
Route::middleware(['auth'])->group(function(){

    // main nav bar links ("all" types)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/resources', function(){
        return view('resources_all');
    })->name('resources');

    Route::get('/messages', function(){
        return view('messages_all');
    })->name('messages');

});

require __DIR__.'/auth.php';
require __DIR__.'/tasks.php';