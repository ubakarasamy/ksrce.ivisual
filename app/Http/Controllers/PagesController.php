<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class PagesController extends Controller
{
    public function closeSemesterview(){
       
        
        return view('common.closeSemester');
    }


    public function closeSemester(Request $request){
        $students = Student::all();
        if($request->test === 'closesem'){
        foreach($students as $student){
        
        if($student->semester < 8 && $student->semester == 2 || $student->semester == 4 || $student->semester == 6){
            //increase Semester and Year
            $student->semester = $student->semester + 1;
            $student->year = $student->year + 1;
            
        }elseif($student->semester < 8){
            //increase semester
            $student->semester = $student->semester + 1;
        }
            $student->save();
        }
    }
    }

    
}
