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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\GirlfriendJsonController;
use App\Http\Controllers\Admin\UserJsonController;
use App\Http\Controllers\FeedbackController;

Route::get('/',                                  [PagesController::class, 'index'])->name('index');
Route::get('/rent-a-girlfriend',                 [PagesController::class, 'rent'])->name('rent');
Route::get('/tags',                              [PagesController::class, 'tags'])->name('tags');
Route::get('/tags/select/{tag}',                 [TagsController::class, 'selectTagsJSON']);
Route::get('/search',                            [PagesController::class, 'search'])->name('search');
Route::get('/search/girlfriend/json/{username}', [GirlfriendJsonController::class, 'searchgirlfriendJSON']);
Route::get('/girlfriend/check_rent/json/{id}',   [GirlfriendJsonController::class, 'checkGirlfriendRentJSON']);
Route::get('/rent/girlfriend/JSON',              [GirlfriendJsonController::class, 'rentgirlfriendJSON']);

/* =========================== PAGES FOR AUTHENTICATED USER ===========================*/
Route::group(['middleware' => 'auth'], function() {
  Route::get('/profile',                  [PagesController::class, 'profile'])->name('profile');
  Route::get('/girlfriend-account',       [PagesController::class, 'girlfriendAccount'])->name('girlfriend-account');
  Route::get('/settings',                 [PagesController::class, 'settings'])->name('settings');
  Route::get('/apply-as-girlfriend',      [PagesController::class, 'apply'])->name('apply');
  Route::get('/my-rent',                  [PagesController::class, 'myRent'])->name('my-rent');
  Route::get('/notifications',            [PagesController::class , 'notifications'])->name('notifications');
  Route::get('/notifications/json',       [NotificationController::class, 'notificationJSON']);
  Route::post('/notification/read/{id}',  [NotificationController::class, 'markAsRead']);
  Route::post('/apply-as-girlfriend',     [GirlfriendController::class, 'applygirlfriend']);
  Route::post('/apply-as-girlfriend-tags',[TagsController::class, 'create']);
});

Route::group(['prefix' => 'user'], function() {
  Route::group(['middleware' => 'guest'] ,function() {
    Route::get('/login',                    [LoginController::class, 'index'])->name('login');
    Route::get('/register',                 [RegisterController::class, 'index'])->name('register');
    Route::post('/register',                [RegisterController::class, 'create'])->name('register-user');
    Route::post('/login',                   [LoginController::class, 'create'])->name('login-user');
  });/*=========================== USER GUEST ROUTES===========================*/
  Route::group(['middleware' => 'auth'], function() {
    Route::post('/update',                  [RegisterController::class, 'update'])->name('update-user');
    Route::post('/update/image',            [RegisterController::class, 'updateImage']);
    Route::post('/settings/check-password', [RegisterController::class, 'checkPassword']);
    Route::post('/settings/reset-password', [RegisterController::class, 'resetPassword']);
    Route::post('/logout',                  [LogoutController::class, 'create'])->name('logout-user');
  });/*=========================== USER AUTH ROUTES===========================*/
});

/* =========================== ADMIN ROUTES =========================== */
Route::group(['middleware' => ['CheckAdmin','auth'], 'prefix' => 'admin'], function() {
  /* =========================== ADMIN PAGES =========================== */
  Route::get('/dashboard',                      [AdminPagesController::class, 'dashboard'])->name('dashboard');
  Route::get('/accountlist',                    [AdminPagesController::class, 'accountlist'])->name('accountlist');
  Route::get('/active_rents',                   [AdminPagesController::class, 'activerents'])->name('activerents');
  Route::get('/addgirlfriend',                  [AdminPagesController::class, 'addgirlfriend'])->name('addgirlfriend');
  Route::get('/girlfriendlist',                 [AdminPagesController::class, 'girlfriendlist'])->name('girlfriendlist');
  Route::get('/girlfriend_requests',            [AdminPagesController::class, 'girlfriendrequests'])->name('girlfriendrequests');
  Route::get('/archive',                        [AdminPagesController::class, 'girlfriendArchive'])->name('girlfriendarchive');
  /* =========================== USER API =========================== */
  Route::get('/dashboard/json/users',           [UserJsonController::class, 'dashboardUsersJSON']);
  Route::get('/accountlist/json',               [UserJsonController::class, 'accountlistJSON']);
  Route::get('/archive/json',                   [GirlfriendJsonController::class, 'girlfriendArchiveJSON']);
  Route::get('/accountlist/search/{request}',   [UserJsonController::class, 'searchAccount']);
  Route::get('/accountlist/find/{id}',          [UserJsonController::class, 'findAccount']);
  Route::get('/chooseuser/{user}',              [UserJsonController::class, 'chooseUser']);
  Route::post('/accoutlist/update/{id}',        [UserJsonController::class, 'updateAccount']);
  /* =========================== GIRLFRIEND API =========================== */
  Route::get('/dashboard/json/top-girlfriends', [GirlfriendJsonController::class, 'dashboardTopGirlfriendsJSON']);
  Route::get('/girlfriendlist/json',            [GirlfriendJsonController::class, 'girlfriendlistJSON']);
  Route::get('/search/{girlfriend}',            [GirlfriendJsonController::class, 'searchgirlfriend']);
  Route::get('/active-rents/json',              [AdminPagesController::class, 'activerentsJSON']);
  /* =========================== GIRLFRIEND MODEL ROUTES =========================== */
  Route::group(['prefix' => 'girlfriend'], function() {
    Route::get('/find/{id}',                    [GirlfriendJsonController::class, 'findGirlfriend']);
    Route::get('/requests/json',                [GirlfriendJsonController::class, 'girlfriendrequestsJSON']);
    Route::post('/create',                      [GirlfriendController::class, 'create']);
    Route::post('/update/id={id}',              [GirlfriendController::class, 'update']);
    Route::post('/accept/id={id}',              [GirlfriendController::class, 'acceptRequest']);
    Route::post('/decline/id={id}',             [GirlfriendController::class, 'declineRequest']);
    Route::post('/create/tag',                  [TagsController::class, 'create']);
    Route::post('/update/tag/id={id}',          [TagsController::class, 'update']);
    Route::post('/archive/{id}',                [GirlfriendController::class, 'archive']);
    Route::post('/remove_archive/{id}',         [GirlfriendController::class, 'removeArchive']);
  });/* =========================== /admin/girlfriend =========================== */
});

/* =========================== RENT MODEL ROUTES =========================== */
Route::group(['middleware' => 'auth', 'prefix' => 'rent'], function() {
  Route::get('/requests',              [RentController::class, 'rentRequestsJSON']);
  Route::get('/girlfriend/{username}', [PagesController::class, 'rentgirlfriend'])->name('rentgirlfriend');
  Route::post('/accept/{id}',          [RentController::class, 'acceptRequest']);
  Route::post('/decline/{id}',         [RentController::class, 'declineRequest']);
  Route::post('/create',               [RentController::class, 'create']);
  Route::delete('/delete/{id}',        [RentController::class, 'delete'])->name('delete-rent');
});
/* =========================== FEEDBACK ROUTES =========================== */
Route::group(['middleware' => 'auth', 'prefix' => 'feedback'], function() {
  Route::post('/create',              [FeedbackController::class, 'create']);
  Route::get('/json/{girlfriend_id}', [FeedbackController::class, 'girlfriendFeedbackJSON']);
});