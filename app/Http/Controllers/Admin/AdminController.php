<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Services\Admin\AdminServices;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct(
        public AdminDataTable $adminDataTable,
        public AdminServices $adminServices
    ) {}
    public function index(){
        if (request()->ajax()) {
            return $this->adminDataTable->dataTable();
        }
        return view('pages.admin.admin.index')->with([
            'columns' => $this->adminDataTable->columns(),
            'admins' => $this->adminServices->index(),
        ]);
    }


    public function create(){
        $roles=Role::get();
        return view('pages.admin.admin.create')->with(
            [
                'roles'=>$roles
            ]);
    }

    public function store(AdminRequest $request)
    {
        try {
            $this->adminServices->store($request);
        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The manager has been added successfully');

    }

    public function edit($id){
        $roles=Role::get();

        $admin= $this->adminServices->findOrFail($id);
        return view('pages.admin.admin.edit')->with(
            [
                'admin'=>$admin,
                'roles'=>$roles
            ]);
    }

    public function update(AdminRequest $request,$id)
    {
        try {

            $this->adminServices->update($id,$request);

        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return  successResponseMessage(message: 'The manager has been updated successfully');

    }
    public function destroy($id)
    {
           try {
        $this->adminServices->destroy($id);
          } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
        return back()->with('message', 'The manager has been deleted successfully');
    }
}
