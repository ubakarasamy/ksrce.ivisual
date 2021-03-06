<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\StaffAttendance;
use App\StaffAttendanceRecord;
use App\User;
use App\Academics;
use App\StaffAtOverall;
use App\Http\Resources\UserResource;
use App\Http\Resources\StaffAttendanceResource;
use App\Http\Resources\StaffAtOverallResource;
use App\Http\Resources\StaffAttendanceRecordResource;
use Excel;

class StaffAttendanceController extends Controller
{

    /*
     * make staff AT View
     */
    public function createAttendance(){
        return view('staffattendance.createAttendance');
    }


    /*
     * Create or Edit Staff AT
     */
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
        $acc = Academics::findOrFail(1);
        $attendance = new StaffAttendance;
$staff = User::where('eid', $request->input('eid'))->first();
        $attendance->staff_id = $staff->id;
        $attendance->attendanceDate = $request->input('makedate');
        $attendance->eid = $request->input('eid');
        $attendance->dateStatus = 0;
        $attendance->year_start = $acc->academic_year;
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
    /*
     * get Staff AT by date
     */
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

    /*
     * get all staffs
     */
    public function AllStaffs(){
        $staffs = User::all();
        // Return collection of Users as a resource
        return UserResource::collection($staffs);
    }

    /*
     * set Staff At
     */
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
            //create
            $aca = Academics::findOrFail(1);
            $start = $aca->academic_year;
        $record = new StaffAttendanceRecord;
        $record->attendanceDate = $date;
        $record->staff_id = $id;
        $record->status = $status;
        $record->eid = $staff_eid;
        $record->year_start = $start;
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

    public function makePresentAllStaffs(Request $request){
        $data = $request->json()->all();
        $staffs = $data['staffs'];
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;

        foreach($staffs as $st) {
            $staff = User::where('id', $st['id'])->first();
        $id = $staff->id;
        $status = $request->input('staff_status');
        $date = $request->input('date');
        // $staff = User::where('id', $id)->first();
        $staff_eid = $staff->eid;
        $ifExists = StaffAttendanceRecord::where([['staff_id', '=', $id], ['attendanceDate', '=', $date]])->first();
        if($ifExists === null){
        //new att
        $record = new StaffAttendanceRecord;
        $record->attendanceDate = $date;
        $record->staff_id = $id;
        $record->status = $status;
        $record->eid = $staff_eid;
        $record->year_start = $start;
        $record->save();

        $ifEx = StaffAtOverall::where('staff_id', $id)->first();
        if($ifEx){ 
            $ifEx->present = $ifEx->present+1;

            $ifEx->save();
        }else{

        //else create
        $inc = new StaffAtOverall;
        $inc->staff_id = $id;
        $inc->academic_year = $start;
        $inc->present = 1;
        $inc->save();

        }
        }
        }
        return response()->json('attendance updated');

    }

    /*
     * AT Overall View
     */
    public function attendanceByOverall(){
        return view('staffattendance.byoverall');
    }

    /*
     * AT Month View
     */
    public function attendanceByMonth(){
        return view('staffattendance.bymonth');
    }

    public function attendanceByDay(){
        return view('staffattendance.byday');
    }

    /*
     * Get all At data
     */
    public function getAllAttendance(){
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $attendanceData = StaffAttendance::where([['attendanceDate', '>=', $start], ['dateStatus', '!=', 0]])->get();
        
        return Response::json($attendanceData);
        // return StaffAttendanceResource::collection($attendanceData);
    }

    public function StaffOverAll(){
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $overAll = StaffAtOverall::where([['academic_year', '>=', $start]])->get();
        return StaffAtOverallResource::collection($overAll);
    }

    public function getAllAtDates(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $datas = StaffAttendance::where([
            ['attendanceDate', '>=', $fromDate],
            ['attendanceDate', '<=', $toDate],
            ['year_start', '<=', $start]
        ])->get();
        return StaffAttendanceResource::collection($datas);
    }
    
    public function getAllAtDatas(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;
        $datas = StaffAttendanceRecord::where([
            ['attendanceDate', '>=', $fromDate],
            ['attendanceDate', '<=', $toDate],
            ['year_start', '<=', $start]
        ])->get();
        return StaffAttendanceRecordResource::collection($datas);
    }
    
    public function getOverallCount(){
        $aca = Academics::findOrFail(1);
        $date = StaffAttendance::where('year_start', $aca->academic_year)->get();

        return StaffAttendanceResource::collection($date);
    }
 
    public function exportView(){
        return view('staffattendance.export');
    }

    
    public function exportAttendance(){

        $fromDate = Input::input('fromDate');
        $toDate = Input::input('toDate');
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;

        //get dates
        $dates = StaffAttendance::where([
            ['attendanceDate', '>=', $fromDate],
            ['attendanceDate', '<=', $toDate],
            ['year_start', '<=', $start]
        ])->get();

        // excel export
		return Excel::create('ksrce_staff_attendance', function($excel) use ($fromDate, $toDate, $start, $dates) {
            foreach ($dates as $dt) {
                $datas = StaffAttendanceRecord::where([
                    ['attendanceDate', '=', $dt->attendanceDate],
                    ['year_start', '=', $start]
                ])->get();

    
            foreach ($datas as $ss) {
                $ss->name = User::find($ss->staff_id)->name;
                unset($ss->id);
                unset($ss->staff_id);
                unset($ss->created_at);
                unset($ss->updated_at);
                unset($ss->year_start);
            }

            $data = $datas->toArray();

            $excel->sheet($dt->attendanceDate, function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
            });
            }           
		})->download('xls');
    }



    public function getstaffAt($id,$date){
        $dateAt = StaffAttendanceRecord::where([
            ['staff_id', '=', $id],
            ['attendanceDate', '=', $date],
            ])->get();
    
        if($dateAt){
            return $dateAt;
        }else{
            return null;
        }
        
    }



}






