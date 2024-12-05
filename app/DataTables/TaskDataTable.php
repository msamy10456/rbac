<?php

namespace App\DataTables;

use App\Core\Enums\StatusEnum;
use App\Core\Enums\PriorityEnum;
use App\Models\Task;
use App\Models\SubCategory;
use App\Services\Task\TaskServices;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TaskDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */


    public function columns()
    {
        return ['title','status','priority','created_at'];
    }
    public function dataTable()
    {
        return DataTables::of($this->query())

            ->addColumn('name', function (Task $task) {
                return $task->name;
            })
            ->addColumn('status', function (Task $task) {
                return StatusEnum::from($task->status)->statusMessage();
            })
            ->addColumn('priority', function (Task $task) {
                return PriorityEnum::from($task->priority)->statusMessage();
            })
            ->addColumn('created_at', function (Task $task) {
                return '  Date :'. $task->created_at->format('Y-m-d') . ' <br>  Time : ' . $task->created_at->translatedFormat('g:i A');
            })
            ->addColumn('action', function (Task $task) {
                return '<div class="d-flex">
									<a  href=' . route('admin.task.edit', $task->id) . ' class="btn btn-primary shadow btn-xs sharp ms-1"> <i class="fas fa-pencil-alt"> </i></a>
									<a  data-href=' . route('admin.task.destroy', $task->id) . ' class="btn btn-danger shadow btn-xs sharp delete-button ms-1" data-id=' . $task->id . ' data-bs-toggle="modal" data-bs-target="#deletemodel"> <i class="fa fa-trash"> </i></a>
									</div>';
            })
            ->rawColumns(['action','created_at','status','priority'])
            ->toJson();
    }
    /**
     * Get the query source of dataTable.
     */
    public function query()
    {
        return (new TaskServices)->index();

    }
}
