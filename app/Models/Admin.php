<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory,HasRoles;
    protected $guarded = [];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
