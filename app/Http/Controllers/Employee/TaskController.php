<?php

namespace App\Http\Controllers\Employee;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\DataTables\TaskDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\Task\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        public TaskServices $taskServices
    ) {}
    public function index(){

        return view('pages.employee.task.index')->with([
            'tasks' => $this->taskServices->index()->groupBy('status'),
        ]);
    }


    public function update(Request $request)
    {
        try {

            $this->taskServices->updateStatus($request);

        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The task has been updated successfully');

    }

}
