<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $employee= Employee::create([
           'name' => 'employee',
           'email' => 'employee@gmail.com',
           'password' => Hash::make(123456),
       ]);
       $employee->sync(Task::pluck('id')->toArray());

    }
}
