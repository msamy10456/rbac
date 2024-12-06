<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function tasks(){
        return $this->belongsToMany(Task::class,'task_employees','employee_id','task_id');
    }
}
