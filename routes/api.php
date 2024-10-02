<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use Illuminate\Support\Facades\Route;

// Rute untuk User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{NIP}', [UserController::class, 'show'])->name('users.show');
Route::put('users/{NIP}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{NIP}', [UserController::class, 'destroy'])->name('users.destroy');

// Rute untuk Cabang
Route::get('/cabang', [CabangController::class, 'index']);
Route::post('/cabang', [CabangController::class, 'store']);
Route::get('/cabang/{No_Cabang}', [CabangController::class, 'show']);
Route::put('/cabang/{No_Cabang}', [CabangController::class, 'update']);
Route::delete('/cabang/{No_Cabang}', [CabangController::class, 'destroy']);
