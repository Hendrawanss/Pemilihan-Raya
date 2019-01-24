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
Route::get('/logout', 'UserController@LogJur');
Route::get('/presma/{id}', 'UserController@getPresma');
Route::get('/bpm/{id}', 'UserController@getBpm');
Route::get('/konfirmasi', 'UserController@StorePilihan');
Route::get('/cek',function(){

});

/* Area Post */
Route::post('/login', 'UserController@loginJurusan');
Route::post('/user', 'UserController@loginUser');


// Area Admin
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/login', function(){
    return view('admin.login');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'AdminController@getDataPresma');
    Route::get('/elektro', 'AdminController@getDataElektro');
    Route::get('/sipil', 'AdminController@getDataSipil');
    Route::get('/mesin', 'AdminController@getDataMesin');
    Route::get('/adbis', 'AdminController@getDataAdbis');
    Route::get('/akuntansi', 'AdminController@getDataAkuntansi');
    Route::get('/datapresma', 'AdminController@indexPresma');
    Route::get('/databpm', 'AdminController@indexBpm');
    Route::get('/dataelektro', 'AdminController@mhsElektro');
    Route::get('/datamesin', 'AdminController@mhsMesin');
    Route::get('/datasipil', 'AdminController@mhsSipil');
    Route::get('/dataakuntansi', 'AdminController@mhsAkun');
    Route::get('/dataadbis', 'AdminController@mhsAdbis');
    Route::get('admin/logout', 'AdminController@logout');
});
