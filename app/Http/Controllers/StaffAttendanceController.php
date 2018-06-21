<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffAttendance;
use App\StaffAttendanceRecord;
use App\User;

use App\Http\Resources\StudentAttendanceRecordResource;

class StaffAttendanceController extends Controller
{


    public function createAttendance(){
        return view('staffattendance.createAttendance');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function storeDateStaff(Request $request)
    {
        //if date already exists edit
        $date = StaffAttendance::where('attendanceDate', $request->input('makedate'));
        if($date !== null){
            //if alredy exists get data from attendance record table and return for editing


            $attendanceData = StaffAttendanceRecord::where('attendanceDate', $request->input('makedate'));
            
            return view('staffattendance.staffrecord')->with('date', $request->input('makedate'));
            
        }else{
        //else create
        $attendance = new StaffAttendance;
$staff = User::where('eid', $eid)->first();
        $attendance->staff_id = $staff->id;
        $attendance->attendanceDate = $request->input('makedate');
        $attendance->eid = $request->input('eid');
$attendance->save();
            //if alredy exists give attendance record table for inserting

            $attendanceData = StaffAttendanceRecord::where('attendanceDate', $request->input('makedate'));

            return view('staffattendance.staffrecord')->with('date', $request->input('makedate'),'data', $attendanceData);

        }
        


}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
