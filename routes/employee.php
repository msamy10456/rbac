<?php

use App\Http\Controllers\Employee\TaskController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Employee\LoginController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// Route::get('/', [HomeController::class,'index'])->name('home');




Route::name("employee.")->group(function () {
    Route::middleware(["auth:employee"])->group(function () {
        Route::resource('/task', TaskController::class)->only('index');
        Route::post('/task', [TaskController::class, 'update'])->name('task.update');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    });
});
