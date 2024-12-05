<?php

namespace App\Http\Controllers\Admin;

use App\Core\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Task;
use App\Services\Employee\EmployeeServices;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::count();
        $admin = Admin::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->count();

        $manager = Admin::whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->count();

        $status_tasks = Task::select('status', \DB::raw('COUNT(*) as total'))
            ->groupBy('status', 'priority')
            ->get();
        $tasks = Task::select('status', 'priority', \DB::raw('COUNT(*) as total'))
            ->groupBy('status', 'priority')
            ->get();

        $total_task = Task::count();
        $completed_task = Task::where('status',StatusEnum::Completed->value)->count();
        $efficiency=@$completed_task/$total_task * 100 ?? 0;

                $avg_time_task = Task::whereNotNull('completed_at')
            ->where('status', StatusEnum::Completed->value)
            ->select(\DB::raw('AVG(TIMESTAMPDIFF(SECOND, created_at, completed_at)) as avg_completion_time'))
            ->value('avg_completion_time');


        return view('pages.admin.home')->with(
            [
                'employees' => $employees,
                'admin' => $admin,
                'manager' => $manager,
                'tasks' => $tasks,
                'avg_time_task' => $avg_time_task,
                'efficiency'=>$efficiency,
                'status_tasks'=>$status_tasks
            ]
        );
    }
}
