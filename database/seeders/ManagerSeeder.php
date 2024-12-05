<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ManagerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $admin= Admin::create([
           'name' => 'manager',
           'email' => 'manager@gmail.com',
           'password' => Hash::make(123456),
       ]);

       $admin->assignRole(Role::query()->where('name','manager')->first());

    }
}
