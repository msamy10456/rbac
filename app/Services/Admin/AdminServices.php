<?php

namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminServices
{

    public function index($active = false)
    {
        return Admin::query()
            ->where('id','!=',1)
            ->latest()
            ->get();
    }

    public function findOrFail($id, $active = false, $withTrashed = false)
    {

        return Admin::query()
            ->where('id','!=',1)
            ->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {
           $admin= Admin::query()->create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
            ]);
            $admin->syncRoles($request->role);
        });
    }

    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {

            $admin = $this->findOrFail($id);
            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);
            if($request->password){
                $admin->update(
                    [
                        'password'=>$request->password
                    ]);
            }
            $admin->syncRoles($request->role);
        });
    }

    public function destroy($id): void
    {
        DB::transaction(function () use ($id) {

            $admin = $this->findOrFail($id);

            $admin->delete();
        });
    }

}
