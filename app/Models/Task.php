<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Task extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
