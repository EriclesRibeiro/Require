<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RoomAuthController;

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

Route::get('/', [UserAuthController::class, 'login']);
Route::get('register', [UserAuthController::class, 'register']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('dashboard', [UserAuthController::class, 'authenticated']);
Route::get('logout', [UserAuthController::class, 'logout']);
Route::get('registerRoom', [RoomAuthController::class, 'room']);
Route::post('createRoom', [RoomAuthController::class, 'createRoom'])->name('auth.createRoom');