<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SettingsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $gs= GeneralSetting::create([
           'title' => 'Role-Based Access Control',
           'address' => 'Egypt',
           'phone' => '12345678',
       ]);
       $gs->addMedia(public_path("logo.png"))->preservingOriginal()->toMediaCollection('logo');

    }
}
