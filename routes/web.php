<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KanoController;
use App\Models\Type;

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
    Route::resource('/fungsionalitas', App\Http\Controllers\FungsionalitasController::class)->only(['create', 'store', 'show', 'update']);
    Route::resource('/analisis', App\Http\Controllers\AnalisisController::class);
    Route::resource('/kano', App\Http\Controllers\KanoController::class)->only(['create', 'store']);
    Route::resource('/ipa', App\Http\Controllers\IPAController::class)->only(['create', 'store']);
    Route::get('/ssi/create', [SSIController::class, 'create'])->name('ssi.create');
    Route::post('/ssi', [SSIController::class, 'store'])->name('ssi.store');
});

Route::get('/ssi/{ssi}', [SSIController::class, 'show'])->name('ssi.show');
Route::group([
    'prefix' => 'api'
], function () {
    Route::get('/bidang/{function_id}', [App\Http\Controllers\ApiController::class, 'bidang']);
    Route::get('/satker/{bidang_id}', [App\Http\Controllers\ApiController::class, 'satker']);
    Route::get('/wilker/{satker_id}', [App\Http\Controllers\ApiController::class, 'wilker']);
});

Route::get('/kano/{function_id}/{type_id}/{satker_id}/{bidang_id}', [KanoController::class, 'show'])->name('kano.show');
