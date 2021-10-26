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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/laporan', 'LaporanController');
Route::resource('/kpa', 'KpaController');
Route::resource('/pptk', 'PptkController');

Route::resource('/program', 'ProgramController');
Route::resource('/kegiatan', 'KegiatanController');
Route::resource('/sub_kegiatan', 'Sub_kegiatanController');
Route::resource('/rincian', 'RincianController');
Route::resource('/sub_rincian', 'Sub_rincianController');
Route::get('/report', 'ReportController@index')->name('report.index');
// Route::resource('/data_pbj', 'Data_pbjController');