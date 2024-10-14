<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
// use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('login.index');
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

// Route::resource('user', UserController::class);
// Route::resource('/user', UserController::class);

// Route::get('/user', [UserController::class, 'index']);
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/{NIP}', [UserController::class, 'show'])->name('users.shows');
// Route::get('/user/{NIP}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route::get('/user/{NIP}', [UserController::class, 'shows']);
// Route::put('/user/{NIP}', [UserController::class, 'update']);
// Route::delete('/user/{NIP}', [UserController::class, 'destroy']);


Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{NIP}', [UserController::class, 'show'])->name('users.shows');
Route::put('/user/{NIP}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{NIP}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/user/{NIP}/edit', [UserController::class, 'edit'])->name('users.edit'); 

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// Tambahkan route ini


////////////////

Route::resource('komputer', KomputerController::class);


//////////////

// Route::resource('services', ServiceController::class);

//////////////

Route::resource('beritaacara', BeritaController::class);

//////////////

Route::resource('cabang', CabangController::class);


/////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// // role admin
// Route::get('/admin', [AdminController::class, 'index'])->name('pengguna.index');
Route::get('/services', [ServiceController::class, 'index']);


require __DIR__.'/auth.php';
