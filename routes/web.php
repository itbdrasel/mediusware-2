<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['controller'=>\App\Http\Controllers\AuthCredentialController::class], function (){
    Route::get('/', 'login');
    Route::post('/store', 'store');
    Route::get('/logout', 'logout');
});


Route::group(['prefix'=>'user','as'=>'user','controller'=>\App\Http\Controllers\UserController::class], function (){
    Route::get('create', 'create')->name('.create');
    Route::post('store', 'store')->name('.store');
});

Route::group(['middleware' => ['admin']], function (){
    Route::group(['prefix'=>'dashboard','as'=>'dashboard','controller'=>\App\Http\Controllers\DashboardController::class], function (){
        Route::get('/', 'index');
    });

    Route::group(['prefix'=>'transactions','as'=>'transactions','controller'=>\App\Http\Controllers\TransactionController::class], function (){
        Route::get('/', 'index');
    });

    Route::group(['prefix'=>'deposit','as'=>'deposit','controller'=>\App\Http\Controllers\DepositController::class], function (){
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{id}/edit', 'edit');
        Route::post('/store', 'store');
    });

    Route::group(['prefix'=>'withdrawal','as'=>'withdrawal','controller'=>\App\Http\Controllers\WithdrawalController::class], function (){
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{id}/edit', 'edit');
        Route::post('/store', 'store');
    });
});


