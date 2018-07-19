<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\StudentAt;
use App\StudentAtRecord;
use App\StudentOver;
use App\Academics;
use App\Http\Resources\StudentOverResource;
use App\Http\Resources\StudentAtRecordResource;
use App\Http\Resources\StudentAtResource;

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
         //$incc = StudentOver::where('student_id', '=', $id)->first();
            //edit attendance
        $record = StudentAtRecord::where([['student_id', '=', $id], ['attendancedate', '=', $date]])->first();

        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;

//removed here 
if($h1){ 
    if ($record->h1 === 'absent' || $record->h1 === 'leave' || $record->h1 === NULL && $h1 === 'present' || $h1 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h1,'h1',$dd->day,$id,$in);
        $record->h1 = $h1;
}
if($h2){ 
    if ($record->h2 === 'absent' || $record->h2 === 'leave' || $record->h2 === NULL && $h2 === 'present' || $h2 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h2,'h2',$dd->day,$id,$in);
        $record->h2 = $h2;
}
if($h3){ 
    if ($record->h3 === 'absent' || $record->h3 === 'leave' || $record->h3 === NULL && $h3 === 'present' || $h3 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h3,'h3',$dd->day,$id,$in);
        $record->h3 = $h3;
}
if($h4){ 
    if ($record->h4 === 'absent' || $record->h4 === 'leave' || $record->h4 === NULL && $h4 === 'present' || $h4 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h4,'h4',$dd->day,$id,$in);
        $record->h4 = $h4;
}
if($h5){ 
    if ($record->h5 === 'absent' || $record->h5 === 'leave' || $record->h5 === NULL && $h5 === 'present' || $h5 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h5,'h5',$dd->day,$id,$in);
        $record->h5 = $h5;
}
if($h6){ 
    if ($record->h6 === 'absent' || $record->h6 === 'leave' || $record->h6 === NULL && $h6 === 'present' || $h6 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h6,'h6',$dd->day,$id,$in);
        $record->h6 = $h6;
}
if($h7){ 
    if ($record->h7 === 'absent' || $record->h7 === 'leave' || $record->h7 === NULL && $h7 === 'present' || $h7 === 'od') {
        $in = false;
    }else{
        $in = true;
    }
      $this->incrementHourOnEdit($h7,'h7',$dd->day,$id,$in);
        $record->h7 = $h7;
}

// if($h2){ $record->h2 = $h2;}
// if($h3){ $record->h3 = $h3;}
// if($h4){ $record->h4 = $h4;}
// if($h5){ $record->h5 = $h5;}
// if($h6){ $record->h6 = $h6;}
// if($h7){ $record->h7 = $h7;}

        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
       // $incc->save();
        return 'data Edited';
        }else{
            //create attendance
$extt = StudentOver::where('student_id', $id)->first();
if($extt === null){

    $acc  =Academics::findOrFail(1);

$incc = new StudentOver;
$incc->student_id = $id;
$incc->sem_start = $acc->academic_semester_start;
$incc->mon1 = 0;$incc->mon2 = 0;$incc->mon3 = 0;$incc->mon4 = 0;$incc->mon5 = 0;$incc->mon6 = 0;$incc->mon7 = 0;
$incc->tue1 = 0;$incc->tue2 = 0;$incc->tue3 = 0;$incc->tue4 = 0;$incc->tue5 = 0;$incc->tue6 = 0;$incc->tue7 = 0;
$incc->wed1 = 0;$incc->wed2 = 0;$incc->wed3 = 0;$incc->wed4 = 0;$incc->wed5 = 0;$incc->wed6 = 0;$incc->wed7 = 0;
$incc->thu1 = 0;$incc->thu2 = 0;$incc->thu3 = 0;$incc->thu4 = 0;$incc->thu5 = 0;$incc->thu6 = 0;$incc->thu7 = 0;
$incc->fri1 = 0;$incc->fri2 = 0;$incc->fri3 = 0;$incc->fri4 = 0;$incc->fri5 = 0;$incc->fri6 = 0;$incc->fri7 = 0;
$incc->save();
}

        $record = new StudentAtRecord;
//$incc = StudentOver::where('student_id', '=', $id)->first();
$dd = StudentAt::where('attendancedate', '=', $date)->first();
$acc = Academics::findOrFail(1);
$record->sem_start = $acc->academic_semester_start;
        $record->attendancedate = $date;
        $record->student_id = $id;
        $record->regno = $student_regno;

        if($h1){ 
                $in = false;
              $this->incrementHourOnEdit($h1,'h1',$dd->day,$id,$in);
                $record->h1 = $h1;
        }
        if($h2){ 
            $in = false;
              $this->incrementHourOnEdit($h2,'h2',$dd->day,$id,$in);
                $record->h2 = $h2;
        }
        if($h3){ 
            $in = false;
              $this->incrementHourOnEdit($h3,'h3',$dd->day,$id,$in);
                $record->h3 = $h3;
        }
        if($h4){ 
            $in = false;
              $this->incrementHourOnEdit($h4,'h4',$dd->day,$id,$in);
                $record->h4 = $h4;
        }
        if($h5){ 
            $in = false;
              $this->incrementHourOnEdit($h5,'h5',$dd->day,$id,$in);
                $record->h5 = $h5;
        }
        if($h6){ 
            $in = false;
              $this->incrementHourOnEdit($h6,'h6',$dd->day,$id,$in);
                $record->h6 = $h6;
        }
        if($h7){ 
            $in = false;
              $this->incrementHourOnEdit($h7,'h7',$dd->day,$id,$in);
                $record->h7 = $h7;
        }
        
        $record->hrspresent = null;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
        //$incc->save();
        return 'data Entered';
        }
    }



    //get attendance by Day
    public function attendanceByDay(){
        return view('studentattendance.byday');
    }
    //get attendance by Day
    public function attendanceByMonth(){
        return view('studentattendance.bymonth');
    }
    //get attendance by Day
    public function attendanceByOverall(){
        return view('studentattendance.byoverall');
    }
    public function getAllStudentAttendance(){
        $datas = StudentAtRecord::all();
        return StudentAtRecordResource::collection($datas);
    }
    public function StudOverall(){
        $ovrall = StudentOver::all();
        return StudentOverResource::collection($ovrall);
    } 
    public function consolidatedMonth(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $datas = StudentAtRecord::where([['attendancedate', '>=', $fromDate], ['attendancedate', '<=', $toDate]])->get();
        return StudentAtRecordResource::collection($datas);  
    }
    public function allDatesConsolidated(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $datas = StudentAt::where([['attendancedate', '>=', $fromDate], ['attendancedate', '<=', $toDate]])->get();
        return StudentAtResource::collection($datas);  
    }

    public function incrementHourOnEdit($hour,$h,$day,$studId,$inc){
        $incc = StudentOver::where('student_id', '=', $studId)->first();

        switch ($day){
            //monday
            case 'mon':
                    switch ($h) {
                        case 'h1':
                        if($inc === true){
                            $incc->mon1 = $incc->mon1-1;
                        }else{
                            $incc->mon1 = $incc->mon1+1;
                        }
                            break;
                        
                        case 'h2':
                        if($inc === true){
                            $incc->mon2 = $incc->mon2-1;
                        }else{
                            $incc->mon2 = $incc->mon2+1;
                        }
                            break;
                            case 'h3':
                            if($inc === true){
                                $incc->mon3 = $incc->mon3-1;
                            }else{
                                $incc->mon3 = $incc->mon3+1;
                            }
                            break;
                            case 'h4':
                            if($inc === true){
                                $incc->mon4 = $incc->mon4-1;
                            }else{
                                $incc->mon4 = $incc->mon4+1;
                            }
                            break;
                            case 'h5':
                            if($inc === true){
                                $incc->mon5 = $incc->mon5-1;
                            }else{
                                $incc->mon5 = $incc->mon5+1;
                            }
                            break;
                            case 'h6':
                            if($inc === true){
                                $incc->mon6 = $incc->mon6-1;
                            }else{
                                $incc->mon6 = $incc->mon6+1;
                            }
                            break;
                            case 'h7':
                            if($inc === true){
                                $incc->mon7 = $incc->mon7-1;
                            }else{
                                $incc->mon7 = $incc->mon7+1;
                            }
                            break;
                    }
            break;
             //tuesday
             case 'tue':
                    switch ($h) {
                        case 'h1':
                        if($inc === true){
                            $incc->tue1 = $incc->tue1-1;
                        }else{
                            $incc->tue1 = $incc->tue1+1;
                        }
                            break;
                        
                        case 'h2':
                        if($inc === true){
                            $incc->tue2 = $incc->tue2-1;
                        }else{
                            $incc->tue2 = $incc->tue2+1;
                        }
                            break;
                            case 'h3':
                            if($inc === true){
                                $incc->tue3 = $incc->tue3-1;
                            }else{
                                $incc->tue3 = $incc->tue3+1;
                            }
                            break;
                            case 'h4':
                            if($inc === true){
                                $incc->tue4 = $incc->tue4-1;
                            }else{
                                $incc->tue4 = $incc->tue4+1;
                            }
                            break;
                            case 'h5':
                            if($inc === true){
                                $incc->tue5 = $incc->tue5-1;
                            }else{
                                $incc->tue5 = $incc->tue5+1;
                            }
                            break;
                            case 'h6':
                            if($inc === true){
                                $incc->tue6 = $incc->tue6-1;
                            }else{
                                $incc->tue6 = $incc->tue6+1;
                            }
                            break;
                            case 'h7':
                            if($inc === true){
                                $incc->tue7 = $incc->tue7-1;
                            }else{
                                $incc->tue7 = $incc->tue7+1;
                            }
                            break;
                    }
            break;
            //wednesday
            case 'wed':
                    switch ($h) {
                        case 'h1':
                        if($inc === true){
                            $incc->wed1 = $incc->wed1-1;
                        }else{
                            $incc->wed1 = $incc->wed1+1;
                        }
                            break;
                        
                        case 'h2':
                        if($inc === true){
                            $incc->wed2 = $incc->wed2-1;
                        }else{
                            $incc->wed2 = $incc->wed2+1;
                        }
                            break;
                            case 'h3':
                            if($inc === true){
                                $incc->wed3 = $incc->wed3-1;
                            }else{
                                $incc->wed3 = $incc->wed3+1;
                            }
                            break;
                            case 'h4':
                            if($inc === true){
                                $incc->wed4 = $incc->wed4-1;
                            }else{
                                $incc->wed4 = $incc->wed4+1;
                            }
                            break;
                            case 'h5':
                            if($inc === true){
                                $incc->wed5 = $incc->wed5-1;
                            }else{
                                $incc->wed5 = $incc->wed5+1;
                            }
                            break;
                            case 'h6':
                            if($inc === true){
                                $incc->wed6 = $incc->wed6-1;
                            }else{
                                $incc->wed6 = $incc->wed6+1;
                            }
                            break;
                            case 'h7':
                            if($inc === true){
                                $incc->wed7 = $incc->wed7-1;
                            }else{
                                $incc->wed7 = $incc->wed7+1;
                            }
                            break;
                    }
            break;
            //thusday
            case 'thu':
                    switch ($h) {
                        case 'h1':
                        if($inc === true){
                            $incc->thu1 = $incc->thu1-1;
                        }else{
                            $incc->thu1 = $incc->thu1+1;
                        }
                            break;
                        
                        case 'h2':
                        if($inc === true){
                            $incc->thu2 = $incc->thu2-1;
                        }else{
                            $incc->thu2 = $incc->thu2+1;
                        }
                            break;
                            case 'h3':
                            if($inc === true){
                                $incc->thu3 = $incc->thu3-1;
                            }else{
                                $incc->thu3 = $incc->thu3+1;
                            }
                            break;
                            case 'h4':
                            if($inc === true){
                                $incc->thu4 = $incc->thu4-1;
                            }else{
                                $incc->thu4 = $incc->thu4+1;
                            }
                            break;
                            case 'h5':
                            if($inc === true){
                                $incc->thu5 = $incc->thu5-1;
                            }else{
                                $incc->thu5 = $incc->thu5+1;
                            }
                            break;
                            case 'h6':
                            if($inc === true){
                                $incc->thu6 = $incc->thu6-1;
                            }else{
                                $incc->thu6 = $incc->thu6+1;
                            }
                            break;
                            case 'h7':
                            if($inc === true){
                                $incc->thu7 = $incc->thu7-1;
                            }else{
                                $incc->thu7 = $incc->thu7+1;
                            }
                            break;
                    }
            break;
            //friday
            case 'fri':
                    switch ($h) {
                        case 'h1':
                        if($inc === true){
                            $incc->fri1 = $incc->fri1-1;
                        }else{
                            $incc->fri1 = $incc->fri1+1;
                        }
                            break;
                        
                        case 'h2':
                        if($inc === true){
                            $incc->fri2 = $incc->fri2-1;
                        }else{
                            $incc->fri2 = $incc->fri2+1;
                        }
                            break;
                            case 'h3':
                            if($inc === true){
                                $incc->fri3 = $incc->fri3-1;
                            }else{
                                $incc->fri3 = $incc->fri3+1;
                            }
                            break;
                            case 'h4':
                            if($inc === true){
                                $incc->fri4 = $incc->fri4-1;
                            }else{
                                $incc->fri4 = $incc->fri4+1;
                            }
                            break;
                            case 'h5':
                            if($inc === true){
                                $incc->fri5 = $incc->fri5-1;
                            }else{
                                $incc->fri5 = $incc->fri5+1;
                            }
                            break;
                            case 'h6':
                            if($inc === true){
                                $incc->fri6 = $incc->fri6-1;
                            }else{
                                $incc->fri6 = $incc->fri6+1;
                            }
                            break;
                            case 'h7':
                            if($inc === true){
                                $incc->fri7 = $incc->fri7-1;
                            }else{
                                $incc->fri7 = $incc->fri7+1;
                            }
                            break;
                    }
            break;
        }
        $incc->save();
    }
    }



