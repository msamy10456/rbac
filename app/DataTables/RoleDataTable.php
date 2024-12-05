<?php

namespace App\DataTables;

use App\Core\Enums\StatusEnum;
use App\Core\Enums\PriorityEnum;
// use App\Models\Role;
use App\Models\SubCategory;
use App\Services\Role\RoleServices;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */


    public function columns()
    {
        return ['name','created_at'];
    }
    public function dataTable()
    {
        return DataTables::of($this->query())

            ->addColumn('name', function (Role $role) {
                return $role->name;
            })
            ->addColumn('created_at', function (Role $role) {
                return '  Date :'. $role->created_at->format('Y-m-d') . ' <br>  Time : ' . $role->created_at->translatedFormat('g:i A');
            })
            ->addColumn('action', function (Role $role) {
                return '<div class="d-flex">
									<a  href=' . route('admin.role.edit', $role->id) . ' class="btn btn-primary shadow btn-xs sharp ms-1"> <i class="fas fa-pencil-alt"> </i></a>
									<a  data-href=' . route('admin.role.destroy', $role->id) . ' class="btn btn-danger shadow btn-xs sharp delete-button ms-1" data-id=' . $role->id . ' data-bs-toggle="modal" data-bs-target="#deletemodel"> <i class="fa fa-trash"> </i></a>
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
        return (new RoleServices)->index();

    }
}
