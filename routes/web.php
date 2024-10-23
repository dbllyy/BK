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



Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{NIP}', [UserController::class, 'show'])->name('users.shows');
Route::put('/user/{NIP}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{NIP}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/user/{NIP}/edit', [UserController::class, 'edit'])->name('users.edit'); 

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// Tambahkan route ini


////////////////

// Routes untuk CabangController
Route::get('/cabang', [CabangController::class, 'index'])->name('cabangs.index');
Route::post('/cabang', [CabangController::class, 'store'])->name('cabangs.store');
Route::get('/cabang/{No_Cabang}', [CabangController::class, 'show'])->name('cabangs.show');
Route::put('/cabang/{No_Cabang}', [CabangController::class, 'update'])->name('cabangs.update');
Route::delete('/cabang/{No_Cabang}', [CabangController::class, 'destroy'])->name('cabangs.destroy');
Route::get('/cabang/{No_Cabang}/edit', [CabangController::class, 'edit'])->name('cabangs.edit');

Route::get('/dashboard', [CabangController::class, 'dashboard'])->name('dashboard');

///////////////////


Route::get('/komputer', [KomputerController::class, 'index'])->name('komputers.index');
Route::get('/komputer/create', [KomputerController::class, 'create'])->name('komputers.create');
Route::post('/komputer', [KomputerController::class, 'store'])->name('komputers.store');
Route::get('/komputer/{id}', [KomputerController::class, 'show'])->name('komputers.show');
Route::get('/komputer/{id}/edit', [KomputerController::class, 'edit'])->name('komputers.edit');
Route::put('/komputer/{id}', [KomputerController::class, 'update'])->name('komputers.update');
Route::delete('/komputer/{id}', [KomputerController::class, 'destroy'])->name('komputers.destroy');

Route::get('/dashboard', [KomputerController::class, 'dashboard'])->name('dashboard');

// Route::resource('komputer', KomputerController::class);


//////////////

// Route::resource('services', ServiceController::class);

//////////////

Route::resource('beritaacara', BeritaController::class);

//////////////


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
