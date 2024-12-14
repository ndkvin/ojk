<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashoardController;
use App\Http\Controllers\FungsionalitasController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/dashboard', App\Http\Controllers\DashoardController::class);

Route::get('/verification', [UserController::class, 'index'])->name('verification.index');
Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
Route::delete('/users/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');


Route::get('/fungsionalitas/create', [FungsionalitasController::class, 'create'])->name('fungsionalitas.create');
Route::post('/fungsionalitas', [FungsionalitasController::class, 'store'])->name('fungsionalitas.store');
