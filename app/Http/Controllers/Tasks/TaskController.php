<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\File;

class TaskController extends Controller
{
    /**
     * show : displays task
     * create : create a task
     * complete : marks task as completed
     * delete : delete a task
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    
    public function  show( $id ){
        return view( 'tasks_view', [
            'data' => Task::findOrFail($id),
            'message' => null
        ]);
    }

    public function create(){
        DB::table('tasks')->insert([
            'title' => request()->input('name'),
            'description' => request()->input('desc'),
            'subject_id' => request()->input('subj'),
            'due_at' => request()->input('dead'),
        ]);

        return view( 'tasks_all', [
            'data' => Task::orderBy('due_at')->get(),
            'message' => "Task successfully created.",
            'timee' => now(),
        ]);
    }

    public function complete($id){
        $target = Task::findOrFail($id);
        $target->completed = !($target->completed);
        $target->submitted_at = now();
        $target->save();
        return view( 'tasks_view', [
            'data' => Task::findOrFail($id),
            'message' => "Status successfully updated."
        ]);
    }

    public function delete($id){
        DB::table('tasks')->delete($id);
        return view('tasks_all', [
            'data' => Task::orderBy('due_at')->get(),
            'message' => "Task successfully deleted.",
            'timee' => now(),
        ]);
    }

    public function file_upload($id){

        // create a file instance and save to directory
        $raw_file = request()->upload;
        $path = $raw_file->storeAs('task_uploads', $raw_file->getClientOriginalName() );

        // create a save file
        $new_file = new \App\Models\File();
        $new_file->file_name = $raw_file->getClientOriginalName();
        $new_file->url = $path;
        $new_file->owner_id = \Auth::id();
        $new_file->save();

        // create a ftpivot instance for future references
        $new_pivot = new \App\Models\File_task();
        $new_pivot->task_id = $id;
        $new_pivot->file_id = $new_file->id;
        $new_pivot->save();
        
        // then afterward: refect uploaded files on task_view.blade.php
        return view('tasks_view', [
            'data' => Task::findOrFail($id),
            'message' => "File successfully uploaded.",
        ]);
    }

}
