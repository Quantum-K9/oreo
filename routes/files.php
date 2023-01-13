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

    Route::get('/deletetaskfile/{tid}/{fid}', function( $tid, $fid ){

        // delete the file
        $file = File::findOrFail( $fid );
        App\Models\File_task::where( 'file_id', '=', $fid )->delete();
        Storage::delete( $file->url );

        // obtain original task and redirect
        return view('tasks_view', [
            'data' => App\Models\Task::findOrFail($tid),
            'message' => "File successfully deleted.",
        ]);
    });
    
    
});
