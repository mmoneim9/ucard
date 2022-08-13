<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMobile;

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

Route::post('register', [UserMobile::class, 'register']);
Route::post('login', [UserMobile::class, 'login']);
Route::post('forgetpass', [UserMobile::class, 'forgetpass']);
Route::post('resetpass', [UserMobile::class, 'resetpass']);
Route::post('getcategories', [UserMobile::class, 'getcategories']);
Route::post('autorecharge', [UserMobile::class, 'autorecharge']);
Route::post('getbalance', [UserMobile::class, 'getbalance']);
Route::post('myinfo', [UserMobile::class, 'myinfo']);
Route::post('manualrecharge', [UserMobile::class, 'manualrecharge']);
Route::post('getpubg', [UserMobile::class, 'getpubg']);
Route::post('getfreefire', [UserMobile::class, 'getfreefire']);
Route::post('getlegend', [UserMobile::class, 'getlegend']);
Route::post('getcards', [UserMobile::class, 'getcards']);
Route::post('buycard', [UserMobile::class, 'getcardvalue']);
Route::post("getcardavailable", [UserMobile::class, 'getcardavailable']);
Route::post('getinfo', [UserMobile::class, 'getinfo']);
Route::post('changepassword', [UserMobile::class, 'changepassword']);
Route::post('contactus', [UserMobile::class, 'contactus']);
Route::post('getmrechargelog', [UserMobile::class, 'getmrechargelog']);
Route::post('getrechargelog', [UserMobile::class, 'getrechargelog']);
