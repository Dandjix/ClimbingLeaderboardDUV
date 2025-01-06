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
Route::get('/blocks', [BlockController::class, 'index'])->name('blocks.index'); // Affichage de la liste des blocs
// Routes protégées pour les administrateurs (création, modification, suppression)
Route::group(['prefix' => 'blocks', 'middleware' => 'auth'], function () {
    Route::get('/create', [BlockController::class, 'create'])->name('blocks.create'); // Création d'un bloc
    Route::post('/', [BlockController::class, 'store'])->name('blocks.store'); // Enregistrement d'un bloc
    Route::get('{block}/edit', [BlockController::class, 'edit'])->name('blocks.edit'); // Formulaire d'édition
    Route::put('{block}', [BlockController::class, 'update'])->name('blocks.update'); // Mise à jour d'un bloc
    Route::delete('{block}', [BlockController::class, 'destroy'])->name('blocks.destroy'); // Suppression d'un bloc
});


use App\Http\Controllers\ClimbController;

Route::post('/toggle-climb/{blockId}', [ClimbController::class, 'toggleClimb'])->name('toggleClimb');

use App\Http\Controllers\AccountController;
Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account');
Route::put('/account', [AccountController::class, 'update'])->name('account.update')->middleware('auth');