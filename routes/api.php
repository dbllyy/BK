<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KomputerController;

use Illuminate\Support\Facades\Route;

// Rute untuk Komputer
Route::get('komputers', [KomputerController::class, 'index']);
Route::post('komputers', [KomputerController::class, 'store']);
Route::get('komputers/{id}', [KomputerController::class, 'show']);
Route::put('komputers/{id}', [KomputerController::class, 'update']);
Route::delete('komputers/{id}', [KomputerController::class, 'destroy']);

// Rute untuk Cabang

Route::get('cabangs', [CabangController::class, 'index']);
Route::post('cabangs', [CabangController::class, 'store']);
Route::get('cabangs/{No_Cabang}', [CabangController::class, 'show']);
Route::put('cabangs/{No_Cabang}', [CabangController::class, 'update']);
Route::delete('cabangs/{No_Cabang}', [CabangController::class, 'destroy']);

/////////////////////
// Rute untuk User
// Route::get('users', [UserController::class, 'index']);
// Route::post('users', [UserController::class, 'store']);
// Route::get('users/{NIP}', [UserController::class, 'show']);
// Route::put('users/{NIP}', [UserController::class, 'update']);
// Route::delete('users/{NIP}', [UserController::class, 'destroy']);

// Rute untuk User
Route::get('services', [UserController::class, 'index']);
Route::post('services', [UserController::class, 'store']);
Route::get('services/{id}', [UserController::class, 'show']);
Route::put('services/{id}', [UserController::class, 'update']);
Route::delete('services/{id}', [UserController::class, 'destroy']);

