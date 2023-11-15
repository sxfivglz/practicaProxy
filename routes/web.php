<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showRegisterForm']);
Route::post('/registro', [AuthController::class, 'register'])->name('register');
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/inicio', [AuthController::class,'index'])->name('inicio');
Route::get('/dashboard', [AuthController::class,'showDashboard'])->name('dashboard')->middleware('auth');
Route::put('/perfil', [AuthController::class, 'update'])->name('profile.update');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// otras rutas...
