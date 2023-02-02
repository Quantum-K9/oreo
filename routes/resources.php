<?php

use App\Models\Resource;
use App\Http\Controllers\Resources\ResourceController;

// authenticate before allowing access
Route::middleware(['auth'])->group(function () {

    // parent access only //
    Route::group(['middleware' => ['role:parent']], function(){

        Route::get('/resources/create', function(){
            return view( 'resources_create' );
        });

        Route::post('/resources/create/done', [ResourceController::class, 'create']); // finish a create

    });

    // general access //
    Route::get('/resources', function(){
        return view('resources_all',[
            'data'=> Resource::all(),
        ]);
    })->name('resources');

});
