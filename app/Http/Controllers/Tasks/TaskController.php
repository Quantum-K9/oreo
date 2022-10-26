<?php

namespace App\Http\Controllers;

use App\Models\Task;

class CompleteTaskController extends Controller
{
    /**
     * Marks a task as completed
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
   
    public function __invoke( $id ){

        $target = Task::findOrFail( $id );

        $target->completed = true;

        $target->save();

        return view( 'tasks_all' );
    }

}
