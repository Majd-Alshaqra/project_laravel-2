<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\loginAdminController;
use App\Http\Controllers\UserController;
use App\Mail\Admin_Acont;
use App\Mail\sendemail;
use App\Mail\sendUserEmail;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::view('/User', 'User');
Route::post('/save', [UserController::class, 'store'])->name('save');

Route::view('/login', 'logen')->name('login')->middleware('guest:adminlogen');
Route::post('/loginAdmin', [loginAdminController::class, 'login'])->middleware('guest:adminlogen');
Route::prefix('admin')->middleware(['auth:adminlogen', 'verified'])->group(function () {
    Route::view('/index', 'admin.showindex')->name('index');
    Route::get('/showdata', [AdminController::class, 'index'])->name('showdata');
    Route::get('/add', [AdminController::class, 'create']);
    Route::post('add', [AdminController::class, 'store'])->name('add');
    Route::get('/showAdmin', [AdminController::class, 'indexAdmin'])->name('showAdmin');
    Route::get('/editAdmin/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::Put('editAdmins/{id}', [AdminController::class, 'update'])->name('update');
    Route::put('add_response/{id}', [UserController::class, 'update'])->name('add_response');
    Route::put('Adit_status/{id}', [UserController::class, 'Adit_status'])->name('Adit_status');
});
Route::prefix('email')->middleware(['auth:adminlogen'])->group(function () {
    Route::get('/activation', [loginAdminController::class, 'notice'])->name('verification.notice');
    Route::get('/logout', [loginAdminController::class, 'logout'])->name('logout');
    Route::get('/sendemail', [loginAdminController::class, 'sendemail'])->middleware('throttle:6,1')->name('sendemail');
    Route::get('/verify/{id}/{hash}', [loginAdminController::class, 'verify'])->name('verification.verify');
});
