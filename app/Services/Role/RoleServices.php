<?php

namespace App\Services\Role;

use App\Core\Enums\StatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleServices
{

    public function index()
    {
        return Role::query()
            ->where('name','!=','admin')->latest()
            ->get();
    }

    public function findOrFail($id)
    {
        return Role::query()
            ->where('name','!=','admin')->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {
            $role =   Role::query()->create([
                "name" => $request->name,
            ]);
            $role->syncPermissions(Permission::query()->whereIn('id',$request->permissions)->get());
        });

    }

    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {

            $role = $this->findOrFail($id);
            $role->update([
                "name" => $request->name,
            ]);
            $role->syncPermissions(Permission::query()->whereIn('id',$request->permissions)->get());
        });
    }

    public function destroy($id): void
    {
        DB::transaction(function () use ($id) {

            $role = $this->findOrFail($id);

            $role->delete();
        });
    }
}
