<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffAttendance;
use App\User;

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
        
        //else create
        $this->validate($request, array(
            'staff_id'         => 'required|max:255',
            'attendanceDate'          => 'required|max:255',
            'eid'          => 'required|max:255'
        ));

$date = $request->input('attendanceDate');
$eid = $request->input('eid');


        $attendance = new StaffAttendance;
//$staff = User::where('eid', $eid)->first();
        $attendance->staff_id = 1;
        $attendance->attendanceDate = $request->input('attendanceDate');
        $attendance->eid = $request->input('eid');
$attendance->save();

return 'hello';

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
