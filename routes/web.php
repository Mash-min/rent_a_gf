	<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\GirlfriendController;


Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/rent', [PagesController::class, 'rent'])->name('rent');
Route::get('/tags', [PagesController::class, 'tags'])->name('tags');
Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::get('/profile', [PagesController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/settings', [PagesController::class, 'settings'])->name('settings')->middleware('auth');
Route::get('/girlfriend', [PagesController::class, 'girlfriend'])->name('girlfriend')->middleware('auth');

Route::prefix('/user')->group(function() {
	Route::get('/login', [LoginController::class, 'index'])->name('login');
	Route::get('/register', [RegisterController::class, 'index'])->name('register');

	Route::post('/register', [RegisterController::class, 'create'])->name('register-user');
	Route::post('/login', [LoginController::class, 'create'])->name('login-user');
	Route::post('/logout', [LogoutController::class, 'create'])->name('logout-user');

	Route::post('/update', [RegisterController::class, 'update'])->name('update-user')->middleware('auth');
	Route::post('/update/image', [RegisterController::class, 'updateImage'])->middleware('auth');
});

Route::prefix('/admin')->group(function() {
	Route::get('/dashboard', [AdminPagesController::class, 'dashboard'])->name('dashboard');
	Route::get('/accountlist', [AdminPagesController::class, 'accountlist'])->name('accountlist');
	Route::get('/addgirlfriend', [AdminPagesController::class, 'addgirlfriend'])->name('addgirlfriend');

	Route::post('/girlfriend/create', [GirlfriendController::class, 'create']);
});
