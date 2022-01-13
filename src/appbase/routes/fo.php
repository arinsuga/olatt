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

//Absen
Route::get('/','Absen\AbsenController@Check')->name('absen');
Route::get('/all','Absen\AbsenController@Index')->name('absen.all');
Route::post('absen/checkin','Absen\AbsenController@checkin')->name('absen.checkin.post');
Route::post('absen/checkout','Absen\AbsenController@checkout')->name('absen.checkout.post');

//404 - Not Found
Route::fallback(function () {

    abort(404, 'Not Found.');
    // return '<h1>Not Found</h1>';
});
