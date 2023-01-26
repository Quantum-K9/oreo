<?php

use App\Models\Resource;

// authenticate before allowing access
Route::middleware(['auth'])->group(function () {

    // parent access only //
    Route::group(['middleware' => ['role:parent']], function(){

        Route::get('/resources', function(){
            return view('resources_all',[
                'data'=> Resource::all(),
            ]);
        })->name('resources');

    });

    // general access //

    
});
