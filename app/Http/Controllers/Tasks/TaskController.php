<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

}
