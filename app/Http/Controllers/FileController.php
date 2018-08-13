<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Excel;
use App\User;
use App\Student;
use App\Role;

class FileController extends Controller
{
    public function importExport()
	{
		return view('staffprofile.Excel');
	}
	public function downloadStaffExcel($type)
	{
		$data = User::get()->toArray();
		return Excel::create('ksrce_ivisual_staff', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }

    public function downloadStudentExcel($type)
	{
		$data = Student::where('status', 'current')->get()->toArray();
		return Excel::create('ksrce_ivisual_student', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }

	public function importStaffExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
                    $staff = new User;
                    $staff->name = $value->name;
                    $staff->email = $value->email;
                    $staff->password = Hash::make($value->password);
                    $staff->department = $value->department;
                    $staff->mojoined = $value->mojoined;
                    $staff->eid = $value->eid;
                    $staff->role = $value->role;
                    $staff->departmentFor = $value->departmentFor;
                    $staff->profile_url = $value->profile_url;
                    $staff->save();
                    $staffrole = Role::where('name', $value->role)->first();
                    $staff->roles()->attach($staffrole);
            }
        }
		}else{
            echo 'something went wrong';
        }
		return back();
    }
    

    public function importStudentExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {

                    $student = new Student;
                    $student->name = $value->name;
                    $student->email = $value->email;
                    $student->department = $value->department;
                    $student->register_no = $value->register_no;
                    $student->batch = $value->batch;
                    $student->phone = $value->phone;
                    $student->address = $value->address;
                    $student->gurdian_name = $value->gurdian_name;
                    $student->year = $value->year;
                    $student->section = $value->section;
                    $student->semester = $value->semester;
                    $student->degree = $value->degree;
                    $student->bloodGroup = $value->bloodgroup;
                    $student->status = 'current';
                    $student->save();  
            }
        }
		}else{
            echo 'something went wrong';
        }
		return back();
	}

}
