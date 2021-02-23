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
    return view('welcome');
});
Route::get('/no_autorizado', function () {
    return view('no_autorizado');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/multilogin', 'MainController@multilogin')->name('multilogin');
Route::post('/catalogo_membresias', 'MainController@catalogo_membresias')->name('catalogo_membresias');
Route::post('/cambio_contrasena', 'MainController@cambio_contrasena')->name('cambio_contrasena');
Route::post('/kyc', 'MainController@kyc')->name('kyc');
Route::post('/mis_membresias', 'MainController@mis_membresias')->name('mis_membresias');
Route::post('/mis_pagos_mensuales', 'MainController@mis_pagos_mensuales')->name('mis_pagos_mensuales');
Route::post('/mis_transacciones', 'MainController@mis_transacciones')->name('mis_transacciones');
Route::post('/comprar_membresia', 'MainController@comprar_membresia')->name('comprar_membresia');
Route::post('/procesar_pago_cryptocoin', 'MainController@procesar_pago_cryptocoin')->name('procesar_pago_cryptocoin');
Route::post('/pin_update', 'MainController@pin_update')->name('pin_update');

Route::post('/comprar_inversion', 'MainController@comprar_inversion')->name('comprar_inversion');
Route::post('/procesar_pago_inversion', 'MainController@procesar_pago_inversion')->name('procesar_pago_inversion');
