<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->belongsToMany(Task::class);
    }
}
