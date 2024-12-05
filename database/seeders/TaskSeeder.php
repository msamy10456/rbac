<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TaskSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $manager=Admin::role('manager')->first();

      Task::create([
           'title' => 'Task 1',
           'admin_id' =>2,
           'description' => 'Description task 1',
           'status' => StatusEnum::Pending->value,
           'priority' => PriorityEnum::Low->value,
           'admin_id'=>$manager->id,

       ]);
      Task::create([
           'title' => 'Task 2',
           'admin_id' =>2,
           'description' => 'Description task 2',
           'status' => StatusEnum::Pending->value,
           'priority' => PriorityEnum::Low->value,
           'admin_id'=>$manager->id,
       ]);
      Task::create([
           'title' => 'Task 3',
           'admin_id' =>2,
           'description' => 'Description task 3',
           'status' => StatusEnum::Pending->value,
           'priority' => PriorityEnum::Low->value,
           'admin_id'=>$manager->id,

       ]);
    }
}
