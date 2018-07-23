<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\Http\Resources\StudentResource;

class StudentProfileController extends Controller
{
    public function showPage(){
        return view('studentprofile.index');
    }

    public function index(){
        $students = Student::where([['status', '!=', 'passed-out']])->get();
       // Return collection of Users as a resource
       return StudentResource::collection($students);
    }

    public function store(Request $request){

        if($request->isMethod('put')){
            //Update Request
            $student = Student::findOrFail($request->input('student_id'));
            $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->department = $request->input('department');
                $student->register_no = $request->input('register_no');
                $student->batch = $request->input('batch');
                $student->phone = $request->input('phone');
                $student->address = $request->input('address');
                $student->gurdian_name = $request->input('gurdian_name');
                $student->year = $request->input('year');
                $student->section = $request->input('section');
                $student->semester = $request->input('semester');
                $student->degree = $request->input('degree');
                $student->bloodGroup = $request->input('bloodGroup');
                $student->status = 'current';
            
            $student->save();
            if($student->save()) {
                return new StudentResource($student);
            }
        }else{
            //Create Request
                $student = new Student;
                $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->department = $request->input('department');
                $student->register_no = $request->input('register_no');
                $student->batch = $request->input('batch');
                $student->phone = $request->input('phone');
                $student->address = $request->input('address');
                $student->gurdian_name = $request->input('gurdian_name');
                $student->year = $request->input('year');
                $student->section = $request->input('section');
                $student->semester = $request->input('semester');
                $student->degree = $request->input('degree');
                $student->bloodGroup = $request->input('bgroup');
                $student->status = 'current';
                $student->save();
            if($student->save()) {
                return new StudentResource($student);
            }
        }
        
 
       
    }

    public function studBgroup(){
        return view('studentprofile.stud-bgroup');
    }

}
