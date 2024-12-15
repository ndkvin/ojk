<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\DashoardController;
use App\Http\Controllers\FungsionalitasController;
use App\Http\Controllers\KanoController;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => ['auth', App\Http\Middleware\IsSuperAdmin::class],
], function () {
    Route::get('/verification', [UserController::class, 'index'])->name('verification.index');
    Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');
});

Route::group([
    'middleware' => ['auth', App\Http\Middleware\IsAdmin::class],
], function () {
    Route::resource('/fungsionalitas', App\Http\Controllers\FungsionalitasController::class)->only(['create', 'store', 'show']);
    Route::resource('/analisis', App\Http\Controllers\AnalisisController::class);
    Route::resource('/kano', App\Http\Controllers\KanoController::class)->only(['create', 'store']);
    Route::resource('/ipa', App\Http\Controllers\IPAController::class)->only(['create', 'store']);
    Route::get('/ssi/create', [SSIController::class, 'create'])->name('ssi.create');
    Route::post('/ssi', [SSIController::class, 'store'])->name('ssi.store');
    Route::get('/ssi/{ssi}', [SSIController::class, 'show'])->name('ssi.show');
    // Route::get('/fungsionalitas/create', [FungsionalitasController::class, 'create'])->name('fungsionalitas.create');
    // Route::post('/fungsionalitas', [FungsionalitasController::class, 'store'])->name('fungsionalitas.store');
});
