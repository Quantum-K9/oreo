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

        // locate the file
        $file = File::findOrFail( $fid );

        // delete all file-task relations
        App\Models\File_task::where( 'file_id', '=', $fid )->delete();

        // delete the actual file
        Storage::delete( $file->url );

        // delete the file model
        $file->delete();

        // obtain original task and redirect
        return view('tasks_view', [
            'data' => App\Models\Task::findOrFail($tid),
            'message' => "File successfully deleted.",
        ]);
    });
    
    
});
