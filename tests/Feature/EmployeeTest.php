<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Admin;
use App\Models\Employee;
use App\Services\Employee\EmployeeServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    // use RefreshDatabase;

    public $employee;
    public $updated_employee;
    /**
     * A basic test example.
     */

     public function setUp() : void {
        parent::setUp();
            $this->employee=[
                'name'=>'mohammed',
                'email'=>'mohammed@gmail.com',
                'password'=>'123456',
                'password_confirmation'=>'123456',
            ];
            $this->updated_employee=[
                'name'=>'test',
                'email'=>'test@gmail.com',
            ];
            $admin=Admin::first();
            $this->actingAs($admin,'admin');

     }


    public function test_employee_create_database(): void
    {
        // $employee=json_decode(collect($this->employee)->toJson());
        // $this->actingAs($admin);
        $employee=$this->employee;
        $response = $this->postJson(route('admin.employee.store'), $employee);
        $this->assertDatabaseHas('employees',[
            'name'=>'mohammed',
            'email'=>'mohammed@gmail.com',
        ]);
    }
    public function test_employee_update_database(): void
    {
        $employee=$this->employee;

        $current_employee = Employee::where('email',$employee['email'])->first();

        $updated_employee=$this->updated_employee;


        $response = $this->putJson(route('admin.employee.update',$current_employee->id), $updated_employee);

        $this->assertDatabaseHas('employees',$updated_employee);

    }
    public function test_employee_delete_database(): void
    {
        $updated_employee=$this->updated_employee;

        $current_employee = Employee::where('email',$updated_employee['email'])->first();

        $response = $this->deleteJson(route('admin.employee.destroy',$current_employee->id));

        $this->assertModelMissing(new Employee,$current_employee);

    }
}
