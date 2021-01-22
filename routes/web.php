<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;


Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/rent', [PagesController::class, 'rent'])->name('rent');
Route::get('/tags', [PagesController::class, 'tags'])->name('tags');
Route::get('/search', [PagesController::class, 'search'])->name('search');

Route::prefix('/user')->group(function() {
	Route::get('/login', [LoginController::class, 'index'])->name('login');
	Route::get('/register', [RegisterController::class, 'index'])->name('register');
});
