<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('check')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

Route::get('/verify', [\App\Http\Controllers\CheckController::class, 'verify'])->name('verify');
Route::get('/check-index', [\App\Http\Controllers\CheckController::class, 'index'])->name('check.index');
Route::post('/check', [\App\Http\Controllers\CheckController::class, 'check'])->name('check');

\Illuminate\Support\Facades\Schedule::command(\App\Console\Commands\DeleteCode::class)->everySecond();
