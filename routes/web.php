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

//Staff Profile
Route::get('/staffprofile', 'StaffProfileController@showPage')->name('staffprofile-home');
//Student Profile
Route::get('/studentprofile', 'StudentProfileController@showPage')->name('studentprofile-home');

//Close Profile
Route::get('/semester', 'PagesController@closeSemesterview')->name('close-semester');

//Staff Attendance
Route::get('/staff/attendance/create', 'StaffAttendanceController@createAttendance')->name('staffattendance-create');

//Student Attendance
Route::get('/student/attendance/create', 'StudentAttendanceController@createAttendance')->name('studentattendance-create');
