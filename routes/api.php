<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|-----------------------------------------------------------------------|
|                         LOGIN PETUGAS TATIB                           |
|-----------------------------------------------------------------------|
*/
Route::post('login','UserController@login');
Route::get('/login/check', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                         CRUD PETUGAS TATIB                            |
|-----------------------------------------------------------------------|
*/
Route::post('petugas','UserController@store');
Route::put('petugas/{id}','UserController@update');
Route::delete('petugas/{id}','UserController@delete');
Route::get('petugas','UserController@tampil');

/*
|-----------------------------------------------------------------------|
|                              CRUD SISWA                               |
|-----------------------------------------------------------------------|
*/
Route::post('siswa','SiswaController@store')->middleware('jwt.verify');
Route::put('siswa/{id}','SiswaController@update')->middleware('jwt.verify');
Route::delete('siswa/{id}','SiswaController@delete')->middleware('jwt.verify');
Route::get('siswa','SiswaController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                           CRUD PELANGGARAN                            |
|-----------------------------------------------------------------------|
*/
Route::post('pelanggaran','PelanggaranController@store')->middleware('jwt.verify');
Route::put('pelanggaran/{id}','PelanggaranController@update')->middleware('jwt.verify');
Route::delete('pelanggaran/{id}','PelanggaranController@delete')->middleware('jwt.verify');
Route::get('pelanggaran','PelanggaranController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                             CRUD POINT                                |
|-----------------------------------------------------------------------|
*/
Route::post('poin','PoinController@store')->middleware('jwt.verify');
Route::put('pelanggaran/{id}','PoinController@update')->middleware('jwt.verify');
Route::delete('pelanggaran/{id}','PoinController@delete')->middleware('jwt.verify');
Route::get('poin','PoinController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                       CRUD POINT MENCARI                              |
|-----------------------------------------------------------------------|
*/
Route::get('poin_siswa','PoinController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                                DASHBOARD                              |
|-----------------------------------------------------------------------|
*/
Route::get('beranda/statistika','DashboardController@tampil')->middleware('jwt.verify');
