<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

//Page Route
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');

/* Module Route */
Route::resource('module', ModuleController::class);
Route::resource('permission', PermissionController::class);
Route::resource('role', RoleController::class);
Route::resource('visitor', VisitorController::class);
