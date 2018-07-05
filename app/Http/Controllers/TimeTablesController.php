<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetables;
use App\Http\Resources\TimetablesResource;

class TimeTablesController extends Controller
{
    public function timeTables(){
        return view('timetables');
    }

    public function createTable(Request $request){
        $data = $request->json()->all();
        $degree = $data['degree'];
        $year = $data['year'];
        $semester = $data['semester'];
        $department = $data['department'];
        $section = $data['section'];
        $timetable = $data['timetable'];
      //create only
        $creatTable = new Timetables;
        $creatTable->degree = $degree;
        $creatTable->year = $year;
        $creatTable->semester = $semester;
        $creatTable->section = $section;
        $creatTable->department = $department;
        $creatTable->last_modified = 'null';
        $creatTable->mon1 = $timetable['mon1'];
        $creatTable->mon2 = $timetable['mon2'];
        $creatTable->mon3 = $timetable['mon3'];
        $creatTable->mon4 = $timetable['mon4'];
        $creatTable->mon5 = $timetable['mon5'];
        $creatTable->mon6 = $timetable['mon6'];
        $creatTable->mon7 = $timetable['mon7'];
        $creatTable->tue1 = $timetable['tue1'];
        $creatTable->tue2 = $timetable['tue2'];
        $creatTable->tue3 = $timetable['tue3'];
        $creatTable->tue4 = $timetable['tue4'];
        $creatTable->tue5 = $timetable['tue5'];
        $creatTable->tue6 = $timetable['tue6'];
        $creatTable->tue7 = $timetable['tue7'];
        $creatTable->wed1 = $timetable['wed1'];
        $creatTable->wed2 = $timetable['wed2'];
        $creatTable->wed3 = $timetable['wed3'];
        $creatTable->wed4 = $timetable['wed4'];
        $creatTable->wed5 = $timetable['wed5'];
        $creatTable->wed6 = $timetable['wed6'];
        $creatTable->wed7 = $timetable['wed7'];
        $creatTable->thu1 = $timetable['thu1'];
        $creatTable->thu2 = $timetable['thu2'];
        $creatTable->thu3 = $timetable['thu3'];
        $creatTable->thu4 = $timetable['thu4'];
        $creatTable->thu5 = $timetable['thu5'];
        $creatTable->thu6 = $timetable['thu6'];
        $creatTable->thu7 = $timetable['thu7'];
        $creatTable->fri1 = $timetable['fri1'];
        $creatTable->fri2 = $timetable['fri2'];
        $creatTable->fri3 = $timetable['fri3'];
        $creatTable->fri4 = $timetable['fri4'];
        $creatTable->fri5 = $timetable['fri5'];
        $creatTable->fri6 = $timetable['fri6'];
        $creatTable->fri7 = $timetable['fri7'];
        $creatTable->save();
        
        return 'created';
    }
    public function showAllTable(){
        return TimetablesResource::collection(Timetables::all());
    }

}
