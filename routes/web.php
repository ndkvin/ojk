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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/dashboard', App\Http\Controllers\DashoardController::class);

Route::get('/kano/{function_id}/{type_id}/{satker_id}/{bidang_id}', [KanoController::class, 'show'])->name('kano.show');

Route::group([
    'middleware' => ['auth', App\Http\Middleware\IsAdmin::class],
], function () {
    Route::get('/verification', [UserController::class, 'index'])->name('verification.index');
    Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');
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
