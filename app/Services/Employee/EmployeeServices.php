<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeServices
{

    public function index($active = false)
    {
        return Employee::query()
            ->latest()
            ->get();
    }

    public function findOrFail($id, $active = false, $withTrashed = false)
    {

        return Employee::query()
            ->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {
            Employee::query()->create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]);
        });
    }

    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {

            $employee = $this->findOrFail($id);
            $employee->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);
            if($request->password){
                $employee->update(
                    [
                        'password'=>$request->password
                    ]);
            }
        });
    }

    public function destroy($id): void
    {
        DB::transaction(function () use ($id) {

            $employee = $this->findOrFail($id);

            $employee->delete();
        });
    }

}
