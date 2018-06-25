<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffAttendance;
use App\StaffAttendanceRecord;
use App\User;
use App\Http\Resources\UserResource;

use App\Http\Resources\StaffAttendanceRecordResource;

class StaffAttendanceController extends Controller
{


    public function createAttendance(){
        return view('staffattendance.createAttendance');
    }



    public function storeDateStaff(Request $request)
    {
        //if date already exists edit
        $date = StaffAttendance::where('attendanceDate', $request->input('makedate'))->first();
        if($date !== null){
            //if alredy exists get data from attendance record table and return for editing

            $date1 = $request->input('makedate');
            $staffs = User::all();

            $attendanceData = StaffAttendanceRecord::all()->where('attendanceDate', $date1);

            $staffAttendanceData = StaffAttendanceRecordResource::collection($attendanceData);

            $StaffData = [$staffs, $staffAttendanceData];

            return response()->json($StaffData);
        }else{
        //else create
        $attendance = new StaffAttendance;
$staff = User::where('eid', $request->input('eid'))->first();
        $attendance->staff_id = $staff->id;
        $attendance->attendanceDate = $request->input('makedate');
        $attendance->eid = $request->input('eid');
$attendance->save();
$date1 = $request->input('makedate');
            //if alredy not exists give attendance record table for inserting
            $staffs = User::all();
            $attendanceData = StaffAttendanceRecord::all()->where('attendanceDate', $date1);
            $staffAttendanceData = StaffAttendanceRecordResource::collection($attendanceData);
            $StaffData = [$staffs, $staffAttendanceData];

            return response()->json($StaffData);
        }
}

    public function getStaffAttendance(Request $request, $makedate)
    {
    if($request->route('makedate'))
        {
        $attendanceData = StaffAttendanceRecord::all()->where('attendanceDate', $makedate);

        $staffAttendanceData = StaffAttendanceRecordResource::collection($attendanceData);
        
        return $staffAttendanceData;
    }else{
            return 'failed';
        }
    }

    public function AllStaffs(){
        $staffs = User::all();
        // Return collection of Users as a resource
        return UserResource::collection($staffs);
    }


    public function SetStaffData(Request $request){
        $id = $request->input('staff_id');
        $status = $request->input('staff_status');
        $date = $request->input('date');

        $staff = User::where('id', $id)->first();

        $staff_eid = $staff->eid;

        $record = new StaffAttendanceRecord;
        $record->attendanceDate = $date;
        $record->staff_id = $id;
        $record->status = $status;
        $record->eid = $staff_eid;
        $record->save();
        return 'data Entered';

    }


}






