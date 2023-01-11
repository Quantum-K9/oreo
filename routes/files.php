<?php

use App\Models\File;
use Illuminate\Support\Facades\Route;

// authenticate group
Route::middleware(['auth'])->group(function () {

    // GENERAL ACCESS //

    // download file
    Route::get('/viewfile/{id}', function( $id ){
        return Storage::download( File::findOrFail($id)->url );
    });
    
    
});
