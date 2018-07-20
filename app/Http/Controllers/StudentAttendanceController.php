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

            $acc  =Academics::findOrFail(1);
        //else create
        $attendance = new StudentAt;
        $staff = User::where('eid', $request->input('staff_eid'))->first();
        $attendance->staff_id = $staff->id;
        $attendance->attendancedate = $request->input('makedate');
        $attendance->staff_eid = $request->input('staff_eid');
        $attendance->day = $request->input('day');
        $attendance->dateStatus = 0;
        $attendance->degree = $request->input('degree');
        $attendance->department = $request->input('department');
        $attendance->section = $request->input('section');
        $attendance->year = $request->input('year');
        $attendance->semester = $request->input('semester');
        $attendance->sem_start = $acc->academic_semester_start;
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

if($h1){ 

    
    if ($record->h1 === 'absent' || $record->h1 === 'leave' and $h1 === 'present' || $h1 === 'od') {
        $in = false;
        //if increment
        $Tplus1 = 1; 
        $this->incrementHourOnEdit($h1,'h1',$dd->day,$id,$in);
        $record->h1 = $h1;
    }elseif($record->h1 === 'present' || $record->h1 === 'od' and $h1 === 'absent' || $h1 === 'leave'){
        $in = true;
        $Tminus1 = 1; 
        $this->incrementHourOnEdit($h1,'h1',$dd->day,$id,$in);
        $record->h1 = $h1;
    }
      
    $record->h1 = $h1;
}
if($h2){ 
    if ($record->h2 === 'absent' || $record->h2 === 'leave' || $record->h2 === NULL && $h2 === 'present' || $h2 === 'od') {
        $in = false;
        $Tplus2 = 1; 
        $this->incrementHourOnEdit($h2,'h2',$dd->day,$id,$in);
    }elseif($record->h2 === 'present' || $record->h2 === 'od' and $h2 === 'absent' || $h2 === 'leave'){
        $in = true;
        $Tminus2 = 1; 
        $this->incrementHourOnEdit($h2,'h2',$dd->day,$id,$in);
    }
     
        $record->h2 = $h2;
}
if($h3){ 
    if ($record->h3 === 'absent' || $record->h3 === 'leave' || $record->h3 === NULL && $h3 === 'present' || $h3 === 'od') {
        $in = false;
        $Tplus3 = 1; 
        $this->incrementHourOnEdit($h3,'h3',$dd->day,$id,$in);
    }elseif($record->h3 === 'present' || $record->h3 === 'od' and $h3 === 'absent' || $h3 === 'leave'){
        $in = true;
        $Tminus3 = 1; 
        $this->incrementHourOnEdit($h3,'h3',$dd->day,$id,$in);
    }
      
        $record->h3 = $h3;
}
if($h4){ 
    if ($record->h4 === 'absent' || $record->h4 === 'leave' || $record->h4 === NULL && $h4 === 'present' || $h4 === 'od') {
        $in = false;
        $Tplus4 = 1; 
        $this->incrementHourOnEdit($h4,'h4',$dd->day,$id,$in);
    }elseif($record->h4 === 'present' || $record->h4 === 'od' and $h4 === 'absent' || $h4 === 'leave'){
        $in = true;
        $Tminus4 = 1; 
        $this->incrementHourOnEdit($h4,'h4',$dd->day,$id,$in);
    }
     
        $record->h4 = $h4;
}
if($h5){ 
    if ($record->h5 === 'absent' || $record->h5 === 'leave' || $record->h5 === NULL && $h5 === 'present' || $h5 === 'od') {
        $in = false;
        $Tplus5 = 1; 
        $this->incrementHourOnEdit($h5,'h5',$dd->day,$id,$in);
    }elseif($record->h5 === 'present' || $record->h5 === 'od' and $h5 === 'absent' || $h5 === 'leave'){
        $in = true;
        $Tminus5 = 1; 
        $this->incrementHourOnEdit($h5,'h5',$dd->day,$id,$in);
    }
      
        $record->h5 = $h5;
}
if($h6){ 
    if ($record->h6 === 'absent' || $record->h6 === 'leave' || $record->h6 === NULL && $h6 === 'present' || $h6 === 'od') {
        $in = false;
        $Tplus6 = 1; 
        $this->incrementHourOnEdit($h6,'h6',$dd->day,$id,$in);
    }elseif($record->h6 === 'present' || $record->h6 === 'od' and $h6 === 'absent' || $h6 === 'leave'){
        $in = true;
        $Tminus6 = 1; 
        $this->incrementHourOnEdit($h6,'h6',$dd->day,$id,$in);
    }
      
        $record->h6 = $h6;
}
if($h7){ 
    if ($record->h7 === 'absent' || $record->h7 === 'leave' || $record->h7 === NULL && $h7 === 'present' || $h7 === 'od') {
        $in = false;
        $Tplus7 = 1; 
        $this->incrementHourOnEdit($h7,'h7',$dd->day,$id,$in);
    }elseif($record->h7 === 'present' || $record->h7 === 'od' and $h7 === 'absent' || $h7 === 'leave'){
        $in = true;
        $Tminus7 = 1; 
        $this->incrementHourOnEdit($h7,'h7',$dd->day,$id,$in);
    }
      
        $record->h7 = $h7;
}

//add and sub total hrs
if(empty($Tplus1)){ $Tplus1 =0; }if(empty($Tplus2)){ $Tplus2 =0; }if(empty($Tplus3)){ $Tplus3 =0; }if(empty($Tplus4)){ $Tplus4 =0; }if(empty($Tplus5)){ $Tplus5 =0; }if(empty($Tplus6)){ $Tplus6 =0; }if(empty($Tplus7)){ $Tplus7 =0; }
if(empty($Tminus1)){ $Tminus1 =0; }if(empty($Tminus2)){ $Tminus2 =0; }if(empty($Tminus3)){ $Tminus3 =0; }if(empty($Tminus4)){ $Tminus4 =0; }if(empty($Tminus5)){ $Tminus5 =0; }if(empty($Tminus6)){ $Tminus6 =0; }if(empty($Tminus7)){ $Tminus7 =0; }
$addNu = $Tplus1+$Tplus2+$Tplus3+$Tplus4+$Tplus5+$Tplus6+$Tplus7;
$subNu = $Tminus1+$Tminus2+$Tminus3+$Tminus4+$Tminus5+$Tminus5+$Tminus7;

$totalhrs = $record->hrspresent + $addNu;

$record->hrspresent = $totalhrs - $subNu;
        $record->degree = $student->degree;
        $record->department = $student->department;
        $record->year = $student->year;
        $record->section = $student->section;
        $record->semester = $student->semester;
        $record->save();
       // $incc->save();
        return 'data Edited';
        }else{
            //create

            $acc  =Academics::findOrFail(1);
$extt = StudentOver::where([['student_id', '=', $id],['sem_start', '=', $acc->academic_semester_start]])->get();
if($extt === null){
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
        
        $record->hrspresent = $this->addHours($h1,$h2,$h3,$h4,$h5,$h6,$h7);
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

    public function addHours($h1,$h2,$h3,$h4,$h5,$h6,$h7){
        if($h1 === 'present' || $h1 === 'od'){ $h1 =1; }
        if($h2 === 'present' || $h2 === 'od'){ $h2 =1; }
        if($h3 === 'present' || $h3 === 'od'){ $h3 =1; }
        if($h4 === 'present' || $h4 === 'od'){ $h4 =1; }
        if($h5 === 'present' || $h5 === 'od'){ $h5 =1; }
        if($h6 === 'present' || $h6 === 'od'){ $h6 =1; }
        if($h7 === 'present' || $h7 === 'od'){ $h7 =1; }

        return $h1+$h2+$h3+$h4+$h5+$h6+$h7;
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

    public function makAllPresent(Request $request){
        //students hours date
        $data = $request->json()->all();
        $students = $data['students'];
        $h1 = $request->input('h1');
        $h2 = $request->input('h2');
        $h3 = $request->input('h3');
        $h4 = $request->input('h4');
        $h5 = $request->input('h5');
        $h6 = $request->input('h6');
        $h7 = $request->input('h7');
        $date = $request->input('date');


$dd = StudentAt::where('attendancedate', '=', $date)->first();
$acc = Academics::findOrFail(1);

        foreach ($students as $stud) {

            $student = Student::where('id', $stud['id'])->first();
            $student_regno = $student->register_no;

$ifExists = StudentAtRecord::where([['student_id', '=', $stud['id']], ['attendancedate', '=', $date]])->first();
if($ifExists !== null){
    
    $record = StudentAtRecord::where([['student_id', '=', $stud['id']], ['attendancedate', '=', $date]])->first();

}else{

    $acc  = Academics::findOrFail(1);
    $extt = StudentOver::where([['student_id', '=', $stud['id']],['sem_start', '=', $acc->academic_semester_start]])->first();
    if($extt === null){
    $incc = new StudentOver;
    $incc->student_id = $stud['id'];
    $incc->sem_start = $acc->academic_semester_start;
    $incc->mon1 = 0;$incc->mon2 = 0;$incc->mon3 = 0;$incc->mon4 = 0;$incc->mon5 = 0;$incc->mon6 = 0;$incc->mon7 = 0;
    $incc->tue1 = 0;$incc->tue2 = 0;$incc->tue3 = 0;$incc->tue4 = 0;$incc->tue5 = 0;$incc->tue6 = 0;$incc->tue7 = 0;
    $incc->wed1 = 0;$incc->wed2 = 0;$incc->wed3 = 0;$incc->wed4 = 0;$incc->wed5 = 0;$incc->wed6 = 0;$incc->wed7 = 0;
    $incc->thu1 = 0;$incc->thu2 = 0;$incc->thu3 = 0;$incc->thu4 = 0;$incc->thu5 = 0;$incc->thu6 = 0;$incc->thu7 = 0;
    $incc->fri1 = 0;$incc->fri2 = 0;$incc->fri3 = 0;$incc->fri4 = 0;$incc->fri5 = 0;$incc->fri6 = 0;$incc->fri7 = 0;
    $incc->save();
    }


    $record = new StudentAtRecord;
}
$record->sem_start = $acc->academic_semester_start;
$record->attendancedate = $date;
$record->student_id = $stud['id'];
$record->regno = $student_regno;
$record->degree = $student->degree;
$record->department = $student->department;
$record->year = $student->year;
$record->section = $student->section;
$record->semester = $student->semester;

if($h1){  
    if ($record->h1 === 'absent' || $record->h1 === 'leave' || $record->h1 === NULL && $h1 === 'present' || $h1 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h1,'h1',$dd->day,$stud['id'],$in);
    }
    $record->h1 = $h1; 
}
if($h2){  
    if ($record->h2 === 'absent' || $record->h2 === 'leave' || $record->h2 === NULL && $h2 === 'present' || $h2 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h2,'h2',$dd->day,$stud['id'],$in);
    }
    $record->h2 = $h2; 
}
if($h3){  
    if ($record->h3 === 'absent' || $record->h3 === 'leave' || $record->h3 === NULL && $h3 === 'present' || $h3 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h3,'h3',$dd->day,$stud['id'],$in);
    }
    $record->h3 = $h3; 
}
if($h4){  
    if ($record->h4 === 'absent' || $record->h4 === 'leave' || $record->h4 === NULL && $h4 === 'present' || $h4 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h4,'h4',$dd->day,$stud['id'],$in);
    }
    $record->h4 = $h4; 
}
if($h5){  
    if ($record->h5 === 'absent' || $record->h5 === 'leave' || $record->h5 === NULL && $h5 === 'present' || $h5 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h5,'h5',$dd->day,$stud['id'],$in);
    }
    $record->h5 = $h5; 
}
if($h6){  
    if ($record->h6 === 'absent' || $record->h6 === 'leave' || $record->h6 === NULL && $h6 === 'present' || $h6 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h6,'h6',$dd->day,$stud['id'],$in);
    }
    $record->h6 = $h6; 
}
if($h7){  
    if ($record->h7 === 'absent' || $record->h7 === 'leave' || $record->h7 === NULL && $h7 === 'present' || $h7 === 'od') {
        $in = false;
        $this->incrementHourOnEdit($h7,'h7',$dd->day,$stud['id'],$in);
    }
    $record->h7 = $h7; 
}

$addPrev = $this->addPreviousdata($record->h1,$record->h2,$record->h3,$record->h4,$record->h5,$record->h6,$record->h7);

    $record->hrspresent = $addPrev;

$record->save(); 

}
        return 'success';
    }

    public function addPreviousdata($r1,$r2,$r3,$r4,$r5,$r6,$r7)
    {
        if($r1 === 'present' || $r1 === 'od'){ $r1 =1; }else{ $r1 =0; }
        if($r2 === 'present' || $r2 === 'od'){ $r2 =1; }else{ $r2 =0; }
        if($r3 === 'present' || $r3 === 'od'){ $r3 =1; }else{ $r3 =0; }
        if($r4 === 'present' || $r4 === 'od'){ $r4 =1; }else{ $r4 =0; }
        if($r5 === 'present' || $r5 === 'od'){ $r5 =1; }else{ $r5 =0; }
        if($r6 === 'present' || $r6 === 'od'){ $r6 =1; }else{ $r6 =0; }
        if($r7 === 'present' || $r7 === 'od'){ $r7 =1; }else{ $r7 =0; }

        return $r1+$r2+$r3+$r4+$r5+$r6+$r7;
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



