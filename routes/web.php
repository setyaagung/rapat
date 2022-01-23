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

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/agenda-rapat', 'AgendaRapatController@index')->name('agenda-rapat');
Route::get('/agenda-rapat/detail/{id}', 'AgendaRapatController@detail')->name('agenda-rapat.detail');

Route::namespace('Admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //pegawai
    Route::resource('pegawai', 'PegawaiController');
    //penyelenggara
    Route::resource('penyelenggara', 'PenyelenggaraController');
    //rapat
    Route::resource('rapat', 'RapatController');
    //laporan
    Route::get('/laporan', 'LaporanController@index')->name('laporan');
    Route::get('/laporan/filter', 'LaporanController@filter')->name('laporan.filter');
    Route::get('/laporan/print/dari={dari}/sampai={sampai}', 'LaporanController@print')->name('laporan.print');
    //user
    Route::resource('user', 'UserController');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});
