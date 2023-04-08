<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'userList']);

Route::group(['middleware' => ['auth', 'isAdmin']], function() {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/addUser', [HomeController::class, 'addUser'])->name('addUser');
    Route::post('/user-store', [HomeController::class, 'user_store'])->name('user_store');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/userDetails/{id}', [HomeController::class, 'index'])->name('userDetails');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::get('/profile-update/{id}', [HomeController::class, 'profile_update'])->name('profile_update');
    Route::get('/delete_user/{id}', [HomeController::class, 'delete_user'])->name('delete_user');
});

Auth::routes();

