<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class, 'loginWeb']);


Route::get('/admin', [AdminController::class, 'getAdminWeb']);
Route::get('/logout', [AdminController::class, 'logout']);

Route::post('/AuthenticateWeb', [AdminController::class, 'authenticate']);

Route::post('/createAdmin', [AdminController::class, 'createAdmin']);

Route::post('/deleteAdminWeb', [AdminController::class, 'deleteAdminWeb']);
Route::post('/updateAdminWeb', [AdminController::class, 'updateAdminWeb']);
