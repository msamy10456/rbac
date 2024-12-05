<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::name("admin.")->group(function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware(["auth:admin"])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/employee', EmployeeController::class);
        Route::resource('/manager', AdminController::class);
        Route::resource('/task', TaskController::class);
        Route::resource('/role', RoleController::class);
        Route::get('/generalsettings', [GeneralSettingController::class,'edit'])->name('generalsettings');
        Route::put('/generalsettings', [GeneralSettingController::class,'update'])->name('generalsettings.update');
         Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    });

});
