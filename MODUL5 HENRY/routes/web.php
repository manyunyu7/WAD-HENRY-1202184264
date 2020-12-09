<?php

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
Route::get('/', function () {
    return view('layouts');
});


Route::get('order', function () {
    return view('order.order_landing');
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});


Route::get('order', ['uses' =>'OrderController@index']);

Route::get('history', ['uses' =>'OrderController@history']);

Route::resource('order', OrderController::class);

Route::resource('product', ProductController::class);
