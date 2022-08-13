<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CardsController;

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
Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
//Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('cardcat', [CardsController::class, 'index'])->name('cardcat');
Route::post('insertcat', [CardsController::class, 'insert'])->name('insertcat');
Route::post('updatecat', [CardsController::class, 'update'])->name('updatecat');
Route::get('deletecat/{id}', [CardsController::class, 'delete'])->name('deletecat');
Route::get('card', [CardsController::class, 'indexcard'])->name('card');
Route::post('insertcard', [CardsController::class, 'insertcard'])->name('insertcard');
Route::post('updatecard', [CardsController::class, 'updatecard'])->name('updatecard');
Route::get('deletecard/{id}', [CardsController::class, 'deletecard'])->name('deletecard');
Route::get('cardvalue', [CardsController::class, 'indexcardvalue'])->name('cardvalue');
Route::get('indexcardvalue', [CardsController::class, 'indexcardvalue'])->name('indexcardvalue');
Route::post('insertcardvalue', [CardsController::class, 'insertcardvalue'])->name('insertcardvalue');
Route::get('deletecardvalue/{id}', [CardsController::class, 'deletecardvalue'])->name('deletecardvalue');
Route::get('pubg', [CardsController::class, 'pubg'])->name('pubg');
Route::post('insertpubg', [CardsController::class, 'insertpubg'])->name('insertpubg');
Route::post('updatepubg', [CardsController::class, 'updatepubg'])->name('updatepubg');
Route::get('deletepubg/{id}', [CardsController::class, 'deletepubg'])->name('deletepubg');
Route::get('legend', [CardsController::class, 'legend'])->name('legend');
Route::post('insertlegend', [CardsController::class, 'insertlegend'])->name('insertlegend');
Route::post('updatelegend', [CardsController::class, 'updatelegend'])->name('updatelegend');
Route::get('deletelegend/{id}', [CardsController::class, 'deletelegend'])->name('deletelegend');
Route::get('freefire', [CardsController::class, 'freefire'])->name('freefire');
Route::post('insertfreefire', [CardsController::class, 'insertfreefire'])->name('insertfreefire');
Route::post('updatefreefire', [CardsController::class, 'updatefreefire'])->name('updatefreefire');
Route::get('deletefreefire/{id}', [CardsController::class, 'deletefreefire'])->name('deletefreefire');
Route::get('user', [CardsController::class, 'user'])->name('user');
Route::post('searchuser', [CardsController::class, 'searchuser'])->name('searchuser');
Route::get('approveuser/{id}', [CardsController::class, 'approveuser'])->name('approveuser');
Route::post('addcredit', [CardsController::class, 'addcredit'])->name('addcredit');
Route::post('getusers', [CardsController::class, 'getusers'])->name('getusers');
Route::get('approverecharge/{id}', [CardsController::class, 'approverecharge'])->name('approverecharge');
Route::get('rechargelog', [CardsController::class, 'rechargelog'])->name('rechargelog');
Route::post('getrecharge', [CardsController::class, 'getrecharge'])->name('getrecharge');
Route::post('getrechargedt', [CardsController::class, 'getrechargedt'])->name('getrechargedt');
Route::get('manualrechargelogadmin', [CardsController::class, 'manualrechargelog2'])->name('manualrechargelog2');
Route::get('manualrechargelog', [CardsController::class, 'manualrechargelog'])->name('manualrechargelog');
Route::post('getmanualrecharge', [CardsController::class, 'getmanualrecharge'])->name('getmanualrecharge');
Route::post('getmanualrechargedt', [CardsController::class, 'getmanualrechargedt'])->name('getmanualrechargedt');
Route::post('getmanualrechargeadmin', [CardsController::class, 'getmanualrechargeadmin'])->name('getmanualrechargeadmin');
Route::post('getmanualrechargedtadmin', [CardsController::class, 'getmanualrechargedtadmin'])->name('getmanualrechargedtadmin');
Route::get('approvemanualrecharge/{id}', [CardsController::class, 'approvemanualrecharge'])->name('approvemanualrecharge');
Route::post('getmanualrechargeadmin', [CardsController::class, 'getmanualrecharge2'])->name('getmanualrecharge2');
Route::post('getmanualrechargedtadmin', [CardsController::class, 'getmanualrechargedt2'])->name('getmanualrechargedt2');
Route::get('approvemanualrechargeadmin/{id}', [CardsController::class, 'approvemanualrecharge2'])->name('approvemanualrecharge2');
Route::get('pendingrecharges', [CardsController::class, 'pendingrecharges'])->name('pendingrecharges');
Route::get('pendingrechargesadmin', [CardsController::class, 'pendingrecharges2'])->name('pendingrecharges2');
Route::get('cardsremaining', [CardsController::class, 'cardsremaining'])->name('cardsremaining');
Route::post('addtoken', [CardsController::class, 'addtoken'])->name('addtoken');
Route::get('addadmin', [CardsController::class, 'addadmin'])->name('addadmin');
