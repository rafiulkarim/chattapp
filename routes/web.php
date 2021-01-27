<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeopleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/message/{id}', [App\Http\Controllers\HomeController::class, 'message'])->name('message');

Route::post('/messages', [App\Http\Controllers\HomeController::class, 'sendmessage'])->name('sendmessage');

//front pages
Route::get('/',[FrontController::class, 'login'])->name('login');
Route::post('/registration', [SignupController::class, 'store'])->name('registration');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//dashboard
Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/create_post',[DashboardController::class, 'create_post'])->name('create.post');
Route::get('/dashboard/timeline',[DashboardController::class, 'timeline'])->name('timeline');
Route::get('/dashboard/people', [DashboardController::class, 'people'])->name('people');
Route::get('/dashboard/friend-request', [DashboardController::class, 'friend_request'])->name('friend_request');
Route::get('/dashboard/people/list', [DashboardController::class, 'people_list'])->name('people_list');
Route::get('dashboard/users', [DashboardController::class, 'users'])->name('user');
Route::get('dashboard/chat', [DashboardController::class, 'chat_with_friend'])->name('chat_with_friend');

//friend oparation
Route::get('/add-friend', [PeopleController::class, 'add_friend'])->name('add_friend');
Route::get('/cancel-friend', [PeopleController::class, 'cancel_friend'])->name('cancel_friend');
Route::get('/confirm-friend', [PeopleController::class, 'confirm_friend'])->name('confirm_friend');
Route::get('/delete-friend', [PeopleController::class, 'delete_friend'])->name('delete_friend');
Route::get('/unfrined', [PeopleController::class, 'unfriend'])->name('unfriend');
