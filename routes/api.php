<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getAdmin', [AdminController::class, 'getAdmin']);
Route::get('/searchAdmin', [AdminController::class, 'searchAdmin']);

Route::post('/login', [AdminController::class, 'login']);
Route::post('/signup', [AdminController::class, 'signup']);
Route::post('/deleteAdmin', [AdminController::class, 'deleteAdmin']);
Route::post('/updateAdmin', [AdminController::class, 'updateAdmin']);
