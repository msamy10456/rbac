<?php

namespace Tests\Unit;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Task;
use App\Services\Employee\EmployeeServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeSyncTaskTest  extends TestCase
{
    // use RefreshDatabase;

    public $task1;
    public $task2;
    public $employee;
    public $updated_task;
    /**
     * A basic test example.
     */

     public function setUp() : void {
        parent::setUp();

            $admin=Admin::first();
            $this->actingAs($admin,'admin');

            $this->task1 = Task::factory()->state(['status'=>StatusEnum::Pending->value,'priority'=>PriorityEnum::Low->value])->create();
            $this->task2 = Task::factory()->state(['status'=>StatusEnum::In_progress->value,'priority'=>PriorityEnum::High->value])->create();
            $this->employee = Employee::factory()->create();


     }


    public function test_employee_sync_to_task(): void
    {
        $employee=$this->employee;
        $task1=$this->task1;
        $task2=$this->task2;

        $employee->tasks()->sync([$task1->id,$task2->id]);

        $this->assertCount(2, $employee->tasks);
        $this->assertTrue($employee->tasks->contains($task1));
        $this->assertTrue($employee->tasks->contains($task2));
        $employee->delete();
        $task1->delete();
        $task2->delete();

        $this->assertModelMissing(new Employee,$employee);
        $this->assertModelMissing(new Task,$task1);
        $this->assertModelMissing(new Task,$task1);



    }

}
