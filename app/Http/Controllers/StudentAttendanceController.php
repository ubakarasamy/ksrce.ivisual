<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\StudentAt;
use App\StudentAtRecord;
use App\Http\Resources\StudentAtRecordResource;

class StudentAttendanceController extends Controller
{
    //Show page
    public function createAttendance(){
        return view('studentattendance.createAttendance');
    }
    //insert date in student attendance table
    public function storeDateStaff(Request $request)
    {
        //if date already exists edit
        $date = StudentAt::where('attendancedate', $request->input('makedate'))->first();
        if($date !== null){
            //if alredy exists get data from attendance record table and return for editing
            $date1 = $request->input('makedate');
            $students = Student::all();
            $attendanceData = StudentAtRecord::all()->where('attendancedate', $date1);
            
            return 'date already exists';
        }else{
        //else create
        $attendance = new StudentAt;
        $staff = User::where('eid', $request->input('staff_eid'))->first();
        $attendance->staff_id = $staff->id;
        $attendance->attendancedate = $request->input('makedate');
        $attendance->staff_eid = $request->input('staff_eid');
        $attendance->save();
        $date1 = $request->input('makedate');
            //if alredy not exists give attendance record table for inserting
            
            return 'date already exists';
        }
    }

        public function getStudentAttendance(Request $request, $makedate)
    {
    if($request->route('makedate'))
        {
        $attendanceData = StudentAtRecord::all()->where('attendancedate', $makedate);

        $staffAttendanceData = StudentAtRecordResource::collection($attendanceData);
        
        return $staffAttendanceData;
    }else{
            return 'failed';
        }
    }


    public function SetStudentData(Request $request){

        $id = $request->input('student_id');
        $h1 = $request->input('h1');
        $h2 = $request->input('h2');
        $h3 = $request->input('h3');
        $h4 = $request->input('h4');
        $h5 = $request->input('h5');
        $h6 = $request->input('h6');
        $h7 = $request->input('h7');
        $date = $request->input('date');

        $student = Student::where('id', $id)->first();

        $student_regno = $student->register_no;

        $ifExists = StudentAtRecord::where([['student_id', '=', $id], ['attendancedate', '=', $date]])->first();
        if($ifExists !== null){
            //edit attendance
        $record = StudentAtRecord::where([['student_id', '=', $id], ['attendancedate', '=', $date]])->first();
        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;
        if($h1){ $record->h1 = $h1;}
        if($h2){ $record->h2 = $h2;}
        if($h3){ $record->h3 = $h3;}
        if($h4){ $record->h4 = $h4;}
        if($h5){ $record->h5 = $h5;}
        if($h6){ $record->h6 = $h6;}
        if($h7){ $record->h7 = $h7;}
        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
        return 'data Edited';
        }else{
            //create attendance
        $record = new StudentAtRecord;
        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;
        if($h1){ $record->h1 = $h1; }
        if($h2){ $record->h2 = $h2; }
        if($h3){ $record->h3 = $h3; }
        if($h4){ $record->h4 = $h4; }
        if($h5){ $record->h5 = $h5; }
        if($h6){ $record->h6 = $h6; }
        if($h7){ $record->h7 = $h7; }
        
        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
        return 'data Entered';
        }
    }


    //get attendance by month
    public function attendanceByMonth(){
        return view('studentattendance.bymonth');
    }
        

    public function getAllStudentAttendance(){
        $datas = StudentAtRecord::all();
        return StudentAtRecordResource::collection($datas);
    }

}


