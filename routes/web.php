<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [AccountController::class, 'index'])->name('index');

    Route::group(['prefix' => 'account', 'as' =>'account.'], function(){

        
        Route::get('/show', [AccountController::class, 'show'])->name('show');
        Route::get('/create', [AccountController::class, 'create'])->name('create');
        Route::post('/store', [AccountController::class, 'store'])->name('store');
        Route::get('/{id}/depositSlip', [AccountController::class, 'depositSlip'])->name('depositSlip');
        Route::patch('/{id}/deposit', [AccountController::class, 'deposit'])->name('deposit');

        Route::get('/{id}/withdrawal', [AccountController::class, 'withdrawal'])->name('withdrawal');
        Route::patch('/{id}/withdraw', [AccountController::class, 'withdraw'])->name('withdraw');

    });
});