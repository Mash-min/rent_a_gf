	<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\GirlfriendController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\RentController;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/rent-a-girlfriend', [PagesController::class, 'rent'])->name('rent');
Route::get('/rent/girlfriend/JSON', [PagesController::class, 'rentgirlfriendJSON']);
Route::get('/tags', [PagesController::class, 'tags'])->name('tags');
Route::get('/search', [PagesController::class, 'search'])->name('search');
/* =========================== PAGES FOR AUTHENTICATED USER ===========================*/
Route::group(['middleware' => 'auth'], function() {
  Route::get('/profile', [PagesController::class, 'profile'])->name('profile');
  Route::get('/girlfriend-account', [PagesController::class, 'girlfriendAccount'])->name('girlfriend-account');
  Route::get('/settings', [PagesController::class, 'settings'])->name('settings');
  Route::get('/apply-as-girlfriend', [PagesController::class, 'apply'])->name('apply');
  Route::get('/girlfriend', [PagesController::class, 'girlfriend'])->name('girlfriend');
});
Route::get('/girlfriend/json/{username}', [PagesController::class, 'searchgirlfriendJSON']);
Route::post('/apply-as-girlfriend', [GirlfriendController::class, 'applygirlfriend']);
Route::post('/apply-as-girlfriend-tags', [TagsController::class, 'create']);
/*=========================== USER MODEL ROUTES===========================*/
Route::prefix('/user')->group(function() {
  Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
  Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
  Route::post('/register', [RegisterController::class, 'create'])->name('register-user');
  Route::post('/login', [LoginController::class, 'create'])->name('login-user');
  Route::post('/logout', [LogoutController::class, 'create'])->name('logout-user');
/* =========================== USER ACCOUNT SETTING ROUTES ==================*/
  Route::group(['middleware' => 'auth'], function() {
    Route::post('/update', [RegisterController::class, 'update'])->name('update-user');
    Route::post('/update/image', [RegisterController::class, 'updateImage']);
    Route::post('/settings/check-password', [RegisterController::class, 'checkPassword']);
    Route::post('/settings/reset-password', [RegisterController::class, 'resetPassword']);
  });
});
/* =========================== ROUTES FOR ADMIN =========================== */
Route::group(['middleware' => 'CheckAdmin', 'prefix' => 'admin'], function() {
  /* =========================== DASHBOARD ROUTES =========================== */
  Route::get('/dashboard', [AdminPagesController::class, 'dashboard'])->name('dashboard');
  Route::get('/dashboard/json/users', [AdminPagesController::class, 'dashboardUsersJSON']);
  Route::get('/dashboard/json/top-girlfriends', [AdminPagesController::class, 'dashboardTopGirlfriendsJSON']);
  /* =========================== ACCOUNT LIST ROUTES =========================== */
  Route::get('/accountlist', [AdminPagesController::class, 'accountlist'])->name('accountlist');
  Route::get('/accountlist/json', [AdminPagesController::class, 'accountlistJSON']);
  Route::get('/accountlist/search/{request}', [AdminPagesController::class, 'searchAccount']);
  Route::get('/accountlist/find/{id}', [AdminPagesController::class, 'findAccount']);
  /* =========================== ADD GIRLFRIENDLIST ROUTES =========================== */
  Route::get('/addgirlfriend', [AdminPagesController::class, 'addgirlfriend'])->name('addgirlfriend');
  Route::get('/chooseuser/{user}', [AdminPagesController::class, 'chooseUser']);
  Route::get('/girlfriendlist', [AdminPagesController::class, 'girlfriendlist'])->name('girlfriendlist');
  Route::get('/girlfriendlist/json', [AdminPagesController::class, 'girlfriendlistJSON']);
  Route::get('/girlfriend/find/{id}', [AdminPagesController::class, 'findGirlfriend']);
  Route::get('/girlfriend/requests', [AdminPagesController::class, 'girlfriendrequests'])->name('girlfriendrequests');
  Route::get('/girlfriend/requests/json', [AdminPagesController::class, 'girlfriendrequestsJSON']);
  Route::get('/search/{girlfriend}', [AdminPagesController::class, 'searchgirlfriend']);
  Route::get('/active-rents', [AdminPagesController::class, 'activerents'])->name('activerents');
  Route::get('/active-rents/json', [AdminPagesController::class, 'activerentsJSON']);
  /* =========================== GIRLFRIEND MODEL ROUTES =========================== */
  Route::group(['prefix' => 'girlfriend'], function() {
    Route::post('/create', [GirlfriendController::class, 'create']);
    Route::post('/update/id={id}',[GirlfriendController::class, 'update']);
    Route::post('/accept/id={id}', [GirlfriendController::class, 'acceptRequest']);
    Route::post('/decline/id={id}', [GirlfriendController::class, 'declineRequest']);
    Route::post('/create/tag', [TagsController::class, 'create']);
    Route::post('/update/tag/id={id}',[TagsController::class, 'update']);
  });
});
/* =========================== RENT MODEL ROUTES =========================== */
Route::group(['middleware' => 'auth', 'prefix' => 'rent'], function() {
  Route::get('/girlfriend/{username}', [PagesController::class, 'rentgirlfriend'])->name('rentgirlfriend');
  Route::post('/create', [RentController::class, 'create']);
  Route::delete('/delete/{id}', [RentController::class, 'delete'])->name('delete-rent');
});

