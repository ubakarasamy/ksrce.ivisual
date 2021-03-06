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

//get staff attendance data by month
Route::get('/staff/attendance/overall', 'StaffAttendanceController@attendanceByOverall')->name('staff-attendance-overall');

Route::get('/staff/attendance/day', 'StaffAttendanceController@attendanceByday')->name('staff-attendance-day');

//get student attendance data by month
Route::get('/student/attendance/day', 'StudentAttendanceController@attendanceByDay')->name('student-attendance-byday');

Route::get('/student/attendance/month', 'StudentAttendanceController@attendanceByMonth')->name('student-attendance-bymonth');

Route::get('/student/attendance/overall', 'StudentAttendanceController@attendanceByOverall')->name('student-attendance-byoverall');

Route::get('/staffprofile/myprofile', 'StaffProfileController@showStaffProfile')->name('staffprofile.myprofile');

Route::get('/staffapprovals/myapprovals', 'StaffProfileController@showMyapprovals')->name('staffapprovals-myapprovals');

Route::get('/staffapprovals/approve', 'StaffProfileController@Approve')->name('staffapprovals-approve');

Route::get('/student/timetables', 'TimeTablesController@timeTables')->name('time-tables');

Route::get('/student/class/subjects', 'TimeTablesController@createSubjects')->name('create-subjects');

Route::get('/staff/attendance/month' , 'StaffAttendanceController@attendanceBymonth')->name('staff-attendance-month');

Route::get('/student/bloodgroup', 'StudentProfileController@studBgroup')->name('stud-bgroup');



//show Excel view
Route::get('importExport', 'FileController@importExport');
//Export data
Route::get('downloadStaffExcel/{type}', 'FileController@downloadStaffExcel');
//Export data
Route::get('downloadStudentExcel/{type}', 'FileController@downloadStudentExcel');
//Import Staffs
Route::post('importStaffExcel', 'FileController@importStaffExcel');
//Import Students
Route::post('importStudentExcel', 'FileController@importStudentExcel');


Route::get('/staffattendance/export/month', 'StaffAttendanceController@exportView');

Route::post('/staff/exportMonth', 'StaffAttendanceController@exportAttendance');