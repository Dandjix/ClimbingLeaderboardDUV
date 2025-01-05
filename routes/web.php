<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');


use App\Http\Controllers\Auth\LoginController;
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


use App\Http\Controllers\Auth\RegisterController;
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


use App\Http\Controllers\BlockController;
Route::prefix('blocks')->name('blocks.')->group(function () {
    Route::get('/', [BlockController::class, 'index'])->name('index');
    Route::get('create', [BlockController::class, 'create'])->name('create');
    Route::post('/', [BlockController::class, 'store'])->name('store');
    Route::get('{id}/edit', [BlockController::class, 'edit'])->name('edit');
    Route::put('{id}', [BlockController::class, 'update'])->name('update');
    Route::delete('{id}', [BlockController::class, 'destroy'])->name('destroy'); 
});
