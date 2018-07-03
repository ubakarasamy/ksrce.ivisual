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


// Staff Profile
Route::get('staffprofile', 'StaffProfileController@index');
// Create new Staff
Route::post('staffprofile', 'StaffProfileController@store');
// Update Staff
Route::put('staffprofile', 'StaffProfileController@store');


// Student Profile
Route::get('studentProfile', 'StudentProfileController@index');
// Create new Student
Route::post('studentProfile', 'StudentProfileController@store');
// Update Student
Route::put('studentProfile', 'StudentProfileController@store');



// Update Semester
Route::post('semester', 'PagesController@closeSemester');


// Staff Attendance
Route::post('staffattendance', 'StaffAttendanceController@storeDateStaff');

Route::get('staffattendance/{makedate}', 'StaffAttendanceController@getStaffAttendance');

Route::get('staffattendance/allstaffs', 'StaffAttendanceController@AllStaffs');

Route::post('staffattendance/setstatus', 'StaffAttendanceController@SetStaffData');


Route::post('studentattendance', 'StudentAttendanceController@storeDateStaff');

Route::get('studentattendance/{makedate}', 'StudentAttendanceController@getStudentAttendance');

Route::post('studentattendance/setstatus', 'StudentAttendanceController@SetStudentData');


Route::post('staffapprovals/create', 'StaffApprovalController@createApproval');