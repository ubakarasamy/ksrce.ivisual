<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffAttendance;
use App\StaffAttendanceRecord;
use App\User;
use App\Academics;
use App\StaffAtOverall;
use App\Http\Resources\UserResource;
use App\Http\Resources\StaffAttendanceResource;
use App\Http\Resources\StaffAtOverallResource;

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
        $attendance->dateStatus = 0;
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
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;

        $id = $request->input('staff_id');
        $status = $request->input('staff_status');
        $date = $request->input('date');

        $staff = User::where('id', $id)->first();
        $staff_eid = $staff->eid;
        $ifExists = StaffAttendanceRecord::where([['staff_id', '=', $id], ['attendanceDate', '=', $date]])->first();
        if($ifExists !== null){
            //edit
        $record = StaffAttendanceRecord::where([['staff_id', '=', $id], ['attendanceDate', '=', $date]])->first();

        //for overall
        $ifEx = StaffAtOverall::where('staff_id', $id)->first();
        if($ifEx){ 
            switch ($status) {
                case 'present':
                    $ifEx->present = $ifEx->present+1;
                break;
                case 'absent':
                $ifEx->absent = $ifEx->absent+1;
                break;
                case 'cpl':
                $ifEx->cpl = $ifEx->cpl+1;
                break;
                case 'cl':
                $ifEx->cl = $ifEx->cl+1;
                break;
                case 'present-permission':
                $ifEx->pp = $ifEx->pp+1;
                break;
                case 'present-late':
                $ifEx->pl = $ifEx->pl+1;
                break;
                case 'od':
                $ifEx->od = $ifEx->od+1;
                break;
                case 'sod':
                $ifEx->sod = $ifEx->sod+1;
                break;
            }
            switch ($record->status) {
                case 'present':
                    $ifEx->present = $ifEx->present-1;
                break;
                case 'absent':
                $ifEx->absent = $ifEx->absent-1;
                break;
                case 'cpl':
                $ifEx->cpl = $ifEx->cpl-1;
                break;
                case 'cl':
                $ifEx->cl = $ifEx->cl-1;
                break;
                case 'present-permission':
                $ifEx->pp = $ifEx->pp-1;
                break;
                case 'present-late':
                $ifEx->pl = $ifEx->pl-1;
                break;
                case 'od':
                $ifEx->od = $ifEx->od-1;
                break;
                case 'sod':
                $ifEx->sod = $ifEx->sod+1;
                break;
            }
            $ifEx->save();
        }

        $record->attendanceDate = $date;
        $record->staff_id = $id;
        $record->status = $status;
        $record->eid = $staff_eid;
        $record->save();


        return 'data Edited';
        }else{
            //need to make a update
            // $dateStatus = StaffAttendance::where('attendanceDate', $request->input('date'))->first();
            // if($dateStatus->dateStatus == 0){
            //     $dateStatus->dateStatus = 1;
            // $dateStatus->save();
            // }
            //create
        $record = new StaffAttendanceRecord;
        $record->attendanceDate = $date;
        $record->staff_id = $id;
        $record->status = $status;
        $record->eid = $staff_eid;
        $record->save();

        //increment on overalltable on statuses
        //if already exists edit
        $ifEx = StaffAtOverall::where('staff_id', $id)->first();
        if($ifEx){ 
          
            switch ($status) {
                case 'present':
                    $ifEx->present = $ifEx->present+1;
                break;
                case 'absent':
                $ifEx->absent = $ifEx->absent+1;
                break;
                case 'cpl':
                $ifEx->cpl = $ifEx->cpl+1;
                break;
                case 'cl':
                $ifEx->cl = $ifEx->cl+1;
                break;
                case 'present-permission':
                $ifEx->pp = $ifEx->pp+1;
                break;
                case 'present-late':
                $ifEx->pl = $ifEx->pl+1;
                break;
                case 'od':
                $ifEx->od = $ifEx->od+1;
                break;
                case 'sod':
                $ifEx->sod = $ifEx->sod+1;
                break;
            }

            $ifEx->save();
        }else{

        //else create
        $inc = new StaffAtOverall;
        $inc->staff_id = $id;
        $inc->academic_year = $start;
        if($status == 'present'){$inc->present = 1;}else{$inc->present = 0;} 
        if($status == 'absent'){$inc->absent = 1;} else{$inc->absent = 0;}
        if($status == 'cpl'){$inc->cpl = 1;} else{$inc->cpl = 0;}
        if($status == 'cl'){$inc->cl = 1;} else{$inc->cl = 0;}
        if($status == 'present-permission'){$inc->pp = 1;} else{$inc->pp = 0;}
        if($status == 'present-late'){$inc->pl = 1;} else{$inc->pl = 0;}
        if($status == 'od'){$inc->od = 1;} else{$inc->od = 0;}
        if($status == 'sod'){$inc->sod = 1;} else {$inc->sod = 0;}

        $inc->save();

        }


        return 'data Entered';
        }
    }

    public function attendanceByMonth(){
       // StaffAttendanceRecord::whereMonth('attendanceDate' , Carbon::today()->month);
       
        return view('staffattendance.bymonth');
    }

    public function getAllAttendance(){
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $attendanceData = StaffAttendance::where([['attendanceDate', '>=', $start], ['dateStatus', '!=', 0]])->get();
        return StaffAttendanceResource::collection($attendanceData);
    }
    

    public function StaffOverAll(){
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $overAll = StaffAtOverall::where([['academic_year', '>=', $start]])->get();
        return StaffAtOverallResource::collection($overAll);
    }
    


}






