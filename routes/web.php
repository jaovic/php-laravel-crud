<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('dashboard');
});


// Rotas de autenticação (guest)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rotas protegidas (autenticadas)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Rotas de admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Gerenciamento de usuários
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.role');
});
