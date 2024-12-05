<?php

namespace App\Http\Controllers\Admin;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\DataTables\TaskDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\Employee\EmployeeServices;
use App\Services\Task\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        public TaskDataTable $taskDataTable,
        public TaskServices $taskServices,
        public EmployeeServices $employeeServices,
    ) {}
    public function index(){
        if (request()->ajax()) {
            return $this->taskDataTable->dataTable();
        }
        return view('pages.admin.task.index')->with([
            'columns' => $this->taskDataTable->columns(),
            'tasks' => $this->taskServices->index(),
        ]);
    }


    public function create(){
        $priorities=PriorityEnum::cases();
        $status=StatusEnum::cases();

        return view('pages.admin.task.create')->with([
            'priorities'=>$priorities,
            'status'=>$status,
            "employees"=>$this->employeeServices->index()
        ]);
    }

    public function store(TaskRequest $request)
    {
        try {
            $this->taskServices->store($request);
        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The task has been added successfully');

    }

    public function edit($id){
        $priorities=PriorityEnum::cases();
        $status=StatusEnum::cases();
        $task= $this->taskServices->findOrFail($id);
        return view('pages.admin.task.edit')->with(
            [
                'task'=>$task,
                'priorities'=>$priorities,
                'status'=>$status,
                "employees"=>$this->employeeServices->index()
            ]);
    }

    public function update(TaskRequest $request,$id)
    {
        try {

            $this->taskServices->update($id,$request);

        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The task has been updated successfully');

    }
    public function destroy($id)
    {
           try {
        $this->taskServices->destroy($id);
          } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return back()->with('message', 'The task has been deleted successfully');
    }
}
