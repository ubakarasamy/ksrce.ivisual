<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Academics;
use App\Http\Resources\AcademicsResource;
use Illuminate\Http\Response;

class PagesController extends Controller
{
    public function closeSemesterview(){
       
        
        return view('common.closeSemester');
    }


    public function closeSemester(Request $request){
        $semm = Academics::findOrFail(1);

        switch ($semm->academic_semester) {
            case 'odd':
                $semm->academic_semester = 'even'; 
                $semm->save();
                break;
            case 'even':
                $semm->academic_semester = 'odd';
                $semm->save();
            break; 
        }
        $students = Student::all();
        if($request->test === 'closesem'){
        foreach($students as $student){
        
        if($student->degree === 'be'){
        if($student->semester < 8 && $student->semester == 2 || $student->semester == 4 || $student->semester == 6){
            //increase Semester and Year
            $student->semester = $student->semester + 1;
            $student->year = $student->year + 1;
            
        }elseif($student->semester < 8){
            //increase semester
            $student->semester = $student->semester + 1;
        }elseif($student->semester == 8){
            $student->status = 'passed-out';
        }
            $student->save();
     
        }else if($student->degree === 'me'){
            if($student->semester < 4 && $student->semester == 2){
                //increase Semester and Year
                $student->semester = $student->semester + 1;
                $student->year = $student->year + 1;
                
            }elseif($student->semester < 4){
                //increase semester
                $student->semester = $student->semester + 1;
            }elseif($student->semester == 4){
                $student->status = 'passed-out';
            }
                $student->save();
            }
        }
    }
    }

    public function fetchSemester(){
        return new AcademicsResource(Academics::find(1));
    }

    public function postAcademic(Request $request){
        $year = $request->input('academicYear');
        $cl = $request->input('academicCL');
        $od = $request->input('academicOD');
        $permission = $request->input('academicPermission');
        $late = $request->input('academicLate');

        $data = Academics::findOrFail(1);
        $data->academic_year = $year;
        $data->staff_cl = $cl;
        $data->staff_od = $od;
        $data->staff_permission = $permission;
        $data->staff_late_register = $late;
        $data->save();

    }

    

    
}
