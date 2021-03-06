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

Route::put('changepwd', 'StaffProfileController@changePassword');

// Student Profile
Route::get('studentProfile', 'StudentProfileController@index');
// Create new Student
Route::post('studentProfile', 'StudentProfileController@store');
// Update Student
Route::put('studentProfile', 'StudentProfileController@store');

Route::get('fetchsemester', 'PagesController@fetchSemester');

Route::post('academicyear', 'PagesController@postAcademic');
// Update Semester
Route::post('semester', 'PagesController@closeSemester');


// Staff Attendance
Route::post('staffattendance', 'StaffAttendanceController@storeDateStaff');

Route::get('staffattendance/{makedate}', 'StaffAttendanceController@getStaffAttendance');

Route::get('staffattendance', 'StaffAttendanceController@getAllAttendance');

//Route::get('getstaffattendance/', 'StaffAttendanceController@getTotaldays');


Route::get('staffattendance/allstaffs', 'StaffAttendanceController@AllStaffs');

Route::post('staffattendance/setstatus', 'StaffAttendanceController@SetStaffData');


Route::post('studentattendance', 'StudentAttendanceController@storeDateStaff');

Route::get('studentattendance/{makedate}', 'StudentAttendanceController@getStudentAttendance');

Route::post('studentattendance/setstatus', 'StudentAttendanceController@SetStudentData');

Route::post('staffapprovals/create', 'StaffApprovalController@createApproval');

Route::put('staffapprovals/create', 'StaffApprovalController@createApproval');

Route::get('staffapprovals/{id}', 'StaffApprovalController@getStatus');

Route::delete('staffapprovals', 'StaffApprovalController@removeApproval');

Route::get('staffapprovals', 'StaffApprovalController@getAllApprovals');

Route::post('academic/timetable', 'TimeTablesController@createTable');

Route::get('academic/timetable', 'TimeTablesController@showAllTable');

Route::post('createsubjects', 'TimeTablesController@subjects');

Route::get('staffoverall', 'StaffAttendanceController@StaffOverAll');

//get all timetables
Route::get('alltimetables', 'TimeTablesController@GetSubs');

//get all overall student
Route::get('student/overall', 'StudentAttendanceController@StudOverall');

//get attendance by month
Route::post('student/at/month', 'StudentAttendanceController@consolidatedMonth');

//get attendance dates
Route::post('student/at/dates', 'StudentAttendanceController@allDatesConsolidated');

Route::get('mystafflimits/{userid}', 'StaffApprovalController@getMyLimits');

Route::post('studentattendance/setallstatus', 'StudentAttendanceController@makAllPresent');

Route::post('allstaffdates', 'StaffAttendanceController@getAllAtDates');

Route::post('allstaffatdatas', 'StaffAttendanceController@getAllAtDatas');

Route::post('staffattendance/setallstatus', 'StaffAttendanceController@makePresentAllStaffs');


Route::get('academic/staffoverall', 'StaffAttendanceController@getOverallCount');

