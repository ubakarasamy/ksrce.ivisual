<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\StudentAt;
use App\StudentAtRecord;
use App\StudentOver;
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
        $attendance->day = $request->input('day');
        $attendance->dateStatus = 0;
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

         $dd = StudentAt::where('attendancedate', '=', $date)->first();
         $incc = StudentOver::where('student_id', '=', $id)->first();
            //edit attendance
        $record = StudentAtRecord::where([['student_id', '=', $id], ['attendancedate', '=', $date]])->first();

        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;
        if($h1){ $record->h1 = $h1; if($h1 != 'absent'){ if($h1 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h2){ $record->h2 = $h2; if($h2 != 'absent'){ if($h2 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h3){ $record->h3 = $h3; if($h3 != 'absent'){ if($h3 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h4){ $record->h4 = $h4; if($h4 != 'absent'){ if($h4 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h5){ $record->h5 = $h5; if($h5 != 'absent'){ if($h5 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h6){ $record->h6 = $h6; if($h6 != 'absent'){ if($h6 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h7){ $record->h7 = $h7; if($h7 != 'absent'){ if($h7 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
        $incc->save();
        return 'data Edited';
        }else{
            //create attendance
$incc = new StudentOver;
$incc->student_id = $id;
$incc->mon1 = 0;$incc->mon2 = 0;$incc->mon3 = 0;$incc->mon4 = 0;$incc->mon5 = 0;$incc->mon6 = 0;$incc->mon7 = 0;
$incc->tue1 = 0;$incc->tue2 = 0;$incc->tue3 = 0;$incc->tue4 = 0;$incc->tue5 = 0;$incc->tue6 = 0;$incc->tue7 = 0;
$incc->wed1 = 0;$incc->wed2 = 0;$incc->wed3 = 0;$incc->wed4 = 0;$incc->wed5 = 0;$incc->wed6 = 0;$incc->wed7 = 0;
$incc->thu1 = 0;$incc->thu2 = 0;$incc->thu3 = 0;$incc->thu4 = 0;$incc->thu5 = 0;$incc->thu6 = 0;$incc->thu7 = 0;
$incc->fri1 = 0;$incc->fri2 = 0;$incc->fri3 = 0;$incc->fri4 = 0;$incc->fri5 = 0;$incc->fri6 = 0;$incc->fri7 = 0;
$incc->save();


        $record = new StudentAtRecord;
$incc = StudentOver::where('student_id', '=', $id)->first();
$dd = StudentAt::where('attendancedate', '=', $date)->first();
        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;
        if($h1){ $record->h1 = $h1; if($h1 != 'absent' || $h1 != 'leave'){ 
            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }}}
        if($h2){ $record->h2 = $h2; if($h2 != 'absent'){ if($h2 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h3){ $record->h3 = $h3; if($h3 != 'absent'){ if($h3 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h4){ $record->h4 = $h4; if($h4 != 'absent'){ if($h4 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h5){ $record->h5 = $h5; if($h5 != 'absent'){ if($h5 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h6){ $record->h6 = $h6; if($h6 != 'absent'){ if($h6 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        if($h7){ $record->h7 = $h7; if($h7 != 'absent'){ if($h7 != 'leave'){

            switch ($dd->day){
                case 'mon':$incc->mon1 = $incc->mon1+1;
                break;
                case 'tue':$incc->tue1 = $incc->tue1+1;break;
                case 'wed':$incc->wed1 = $incc->wed1+1;break;
                case 'thu':$incc->thu1 = $incc->thu1+1;break;
                case 'fri':$incc->fri1 = $incc->fri1+1;break; }
        }}}
        
        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
        $incc->save();
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


