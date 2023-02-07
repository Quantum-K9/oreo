<?php

use App\Models\Resource;
use App\Http\Controllers\Resources\ResourceController;

// authenticate before allowing access
Route::middleware(['auth'])->group(function () {

    // parent access only //
    Route::group(['middleware' => ['role:parent']], function(){

        Route::get('/resources/create', function(){
            return view( 'resources_create',[
                'subjs' => App\Models\Subject::all(),
            ]);
        });

        Route::get('/deleteresource/{rid}', function( $rid ){

            // locate  resource
            $resource = Resource::findOrFail( $rid );

            if( $resource->resource_type ){ // file resource

                // locate file
                $file = App\Models\File::findOrFail( $resource->file_id );

                // delete the resource
                $resource->delete();

                // delete the actual file
                Storage::delete( $file->url );

                // delete the file model
                $file->delete();

            } 
            else{ // link resource
                $resource->delete();
            }

            // return to resource_all page
            return view('resources_all',[
            'data'=> Resource::all(),
            ]);

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
