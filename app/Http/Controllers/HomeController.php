<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * Homepage
     */
    public function index()
    {
        $staff_total = User::all()->count();
        $student_total = Student::all()->count();
        $data = ['staff_total' => $staff_total, 'student_total' => $student_total];
        return view('home')->with('data', $data);
    }

    

    public function closeSemesterview(){
        return view('common.closeSemester');
    }

    
    public function closeSemester(Request $request){
        
        $students = Student::all();
        if($request->test == 'closesem'){
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
