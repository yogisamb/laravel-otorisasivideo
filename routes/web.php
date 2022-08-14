<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/video', [DashboardController::class, 'video'])->middleware('auth');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/create', [DashboardController::class, 'create'])->middleware('auth');
Route::post('/buatakun', [DashboardController::class, 'buatakun'])->middleware('auth');
Route::resource('dashboarduser', DashboardUserController::class)->middleware('auth');
Route::post('/hapusakun', [DashboardController::class, 'hapusakun'])->middleware('auth');
Route::post('/editakun', [DashboardController::class, 'editakun'])->middleware('auth');
Route::post('/edituser', [DashboardController::class, 'edituser'])->middleware('auth');
Route::get('/createvideo', [DashboardController::class, 'createvideo'])->middleware('auth');
Route::post('/buatvideo', [DashboardController::class, 'buatvideo'])->middleware('auth');
Route::post('/hapusvideo', [DashboardController::class, 'hapusvideo'])->middleware('auth');
Route::post('/editvideo', [DashboardController::class, 'editvideo'])->middleware('auth');
Route::post('/rubahvideo', [DashboardController::class, 'rubahvideo'])->middleware('auth');
Route::post('/bukavideo', [UserController::class, 'bukavideo'])->middleware('auth');
Route::post('/requestvideo', [UserController::class, 'requestvideo'])->middleware('auth');
Route::post('/activateuser', [DashboardController::class, 'activateuser'])->middleware('auth');
Route::post('/active', [DashboardController::class, 'active'])->middleware('auth');
Route::post('/simpanvideo', [DashboardController::class, 'simpanvideo'])->middleware('auth');
