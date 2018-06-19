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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/staffprofile', 'StaffProfileController@showPage')->name('staffprofile-home');

Route::get('/studentprofile', 'StudentProfileController@showPage')->name('studentprofile-home');


Route::get('/semester', 'HomeController@closeSemesterview')->name('close-semester');
