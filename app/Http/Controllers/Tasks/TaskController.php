<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * show : displays task
     * create : bring to 'create task' page
     * complete : marks task as completed
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
        return view( 'tasks_create' );
    }

    public function complete($id){
        $target = Task::findOrFail($id);
        $target->completed = !($target->completed);
        $target->save();
        return view( 'tasks_view', [
            'data' => Task::findOrFail($id),
            'message' => "!! Status successfully updated."
        ]);
    }

}
