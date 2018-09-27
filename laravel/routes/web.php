<?php

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
/* Area Validate */
Route::get('/','UserController@validasiLoginJurusan');
Route::get('/login', 'UserController@validasiLogin');
Route::get('/user', 'UserController@PilihLagi');

/* Area Get */
Route::get('/coba', function(){
    return view('login');
});
Route::get('/logout', 'UserController@LogJur');
Route::get('/presma/{id}', 'UserController@getPresma');
Route::get('/bpm/{id}', 'UserController@getBpm');
Route::get('/konfirmasi', 'UserController@StorePilihan');

/* Area Post */
Route::post('/login', 'UserController@loginJurusan');
Route::post('/user', 'UserController@loginUser');

/* Area Put */


/* Area Delete */
