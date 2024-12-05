<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $items = [
            [
                "name" => "task",
            ],
            [
                "name"=>"settings"
            ],
            [
                "name"=>"employee"
            ],
            [
                "name"=>"admin"
            ]
        ];
        foreach ($items as $item) {
            Permission::query()->create([
                "name" => $item["name"],
                "guard_name" => "admin"
            ]);
        }
        $role = Role::query()->create([
            "name" => "admin",
            "guard_name" => "admin"
        ]);

        $role->givePermissionTo(Permission::query()->get());

        $role = Role::query()->create([
            "name" => "manager",
            "guard_name" => "admin"
        ]);

        $role->givePermissionTo(Permission::query()->where('name','tasks')->first());

    }
}
