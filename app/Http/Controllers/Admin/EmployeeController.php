<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmployeeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(
        public EmployeeDataTable $employeeDataTable,
        public EmployeeServices $employeeServices
    ) {}
    public function index(){
        if (request()->ajax()) {
            return $this->employeeDataTable->dataTable();
        }
        return view('pages.admin.employee.index')->with([
            'columns' => $this->employeeDataTable->columns(),
            'employees' => $this->employeeServices->index(),
        ]);
    }

    public function create(){

        return view('pages.admin.employee.create');
    }

    public function store(EmployeeRequest $request)
    {
        try {
            $this->employeeServices->store($request);
        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The employee has been added successfully');

    }

    public function edit($id){
        $employee= $this->employeeServices->findOrFail($id);
        return view('pages.admin.employee.edit')->with(
            [
                'employee'=>$employee
            ]);
    }

    public function update(EmployeeRequest $request,$id)
    {
        try {

            $this->employeeServices->update($id,$request);

        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The employee has been updated successfully');

    }
    public function destroy($id)
    {
           try {
        $this->employeeServices->destroy($id);
          } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return back()->with('message', 'The employee has been deleted successfully');
    }
}
