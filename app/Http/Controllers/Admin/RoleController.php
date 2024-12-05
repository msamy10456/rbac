<?php

namespace App\Http\Controllers\Admin;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\Employee\EmployeeServices;
use App\Services\Role\RoleServices;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct(
        public RoleDataTable $roleDataTable,
        public RoleServices $roleServices,
    ) {}
    public function index(){
        if (request()->ajax()) {
            return $this->roleDataTable->dataTable();
        }
        return view('pages.admin.role.index')->with([
            'columns' => $this->roleDataTable->columns(),
            'roles' => $this->roleServices->index(),
        ]);
    }


    public function create(){
        return view('pages.admin.role.create')->with([
            'permissions'=>Permission::get(),
        ]);
    }

    public function store(RoleRequest $request)
    {
        try {
            $this->roleServices->store($request);
        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The role has been added successfully');

    }

    public function edit($id){

        $role= $this->roleServices->findOrFail($id);
        return view('pages.admin.role.edit')->with(
            [
                'role'=>$role,
                'permissions'=>Permission::get(),
            ]);
    }

    public function update(RoleRequest $request,$id)
    {
        try {

            $this->roleServices->update($id,$request);

        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The role has been updated successfully');

    }
    public function destroy($id)
    {
           try {
        $this->roleServices->destroy($id);
          } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return back()->with('message', 'The role has been deleted successfully');
    }
}
