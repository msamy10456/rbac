<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $admin= Admin::create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make(123456),
       ]);
       $admin->assignRole(Role::query()->first());

    }
}
