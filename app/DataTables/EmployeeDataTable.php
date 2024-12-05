<?php

namespace App\DataTables;

use App\Models\Category;
use App\Models\Employee;
use App\Models\SubCategory;
use App\Services\Employee\EmployeeServices;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */


    public function columns()
    {
        return ['name', 'email' ,'created_at'];
    }
    public function dataTable()
    {
        return DataTables::of($this->query())

            ->addColumn('name', function (Employee $employee) {
                return $employee->name;
            })
            ->addColumn('created_at', function (Employee $employee) {
                return '  Date :'. $employee->created_at->format('Y-m-d') . ' <br>  Time : ' . $employee->created_at->translatedFormat('g:i A');
            })
            ->addColumn('action', function (Employee $employee) {
                return '<div class="d-flex">
									<a  href=' . route('admin.employee.edit', $employee->id) . ' class="btn btn-primary shadow btn-xs sharp ms-1"> <i class="fas fa-pencil-alt"> </i></a>
									<a  data-href=' . route('admin.employee.destroy', $employee->id) . ' class="btn btn-danger shadow btn-xs sharp delete-button ms-1" data-id=' . $employee->id . ' data-bs-toggle="modal" data-bs-target="#deletemodel"> <i class="fa fa-trash"> </i></a>
									</div>';
            })
            ->rawColumns(['action','created_at'])
            ->toJson();
    }
    /**
     * Get the query source of dataTable.
     */
    public function query()
    {
        return (new EmployeeServices)->index();
    }
}
