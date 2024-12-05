<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Core\Enums\StatusEnum;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'task_employees', 'task_id', 'employee_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('permission', function ($task) {
            if (auth('admin')->user() && !auth('admin')->user()->hasRole('admin')) {
                return $task->where('admin_id', auth('admin')->user()->id);
            }
        });
    }
}
