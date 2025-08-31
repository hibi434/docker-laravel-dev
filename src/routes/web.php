<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/signin', [LoginController::class, 'login'])->name('login');
    Route::post('/signin', [LoginController::class, 'check'])->name('check');
    Route::get('/signup', [UserController::class, 'create'])->name('user_create');
    Route::post('/signup', [UserController::class, 'store'])->name('user_store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('user_home');
    Route::get('/add', [TaskController::class, 'create'])->name('user_task_create');
    Route::post('/add', [TaskController::class, 'store'])->name('user_task_store');
    Route::post('/signout', [LoginController::class, 'logout'])->name('logout');
});