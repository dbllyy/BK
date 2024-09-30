<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BeritaController;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login', function () {
    return view('auth.login'); // Make sure you create this view
})->name('login');

// Handle the login request
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

////////////////

Route::resource('komputer', KomputerController::class);


//////////////

Route::resource('services', ServiceController::class);

//////////////
Route::resource('beritaacara', ServiceController::class);


require __DIR__.'/auth.php';
