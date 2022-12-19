<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_task_pivot extends Model
{
    use HasFactory;

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function file(){
        return $this->hasOne(File::class);
    }

}
