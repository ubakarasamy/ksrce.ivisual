<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetables;
use App\Http\Resources\TimetablesResource;
use App\ClassSubjects;
use App\Http\Resources\ClassSubjectsResource;

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
    public function createSubjects(){
        return view('studentclass.class-subjects');
    }


    public function subjects(Request $request){

        $data = $request->json()->all();
        $subjects = $data['subjects'];
        $degree = $data['degree'];
        $year = $data['year'];
        $semester = $data['semester'];
        $department = $data['department'];
        $section = $data['section'];

        $subs = new ClassSubjects;
        $subs->degree = $degree;
        $subs->year = $year;
        $subs->semester = $semester;
        $subs->department = $department;
        $subs->section = $section;
        if($subjects['sub1']){ $subs->sub1 = $subjects['sub1']; }else{ $subs->sub1 = 'null'; }
        if($subjects['sub2']){ $subs->sub2 = $subjects['sub2']; }else{ $subs->sub2 = 'null'; }
        if($subjects['sub3']){ $subs->sub3 = $subjects['sub3']; }else{ $subs->sub3 = 'null'; }
        if($subjects['sub4']){ $subs->sub4 = $subjects['sub4']; }else{ $subs->sub4 = 'null'; }
        if($subjects['sub5']){ $subs->sub5 = $subjects['sub5']; }else{ $subs->sub5 = 'null'; }
        if($subjects['sub6']){ $subs->sub6 = $subjects['sub6']; }else{ $subs->sub6 = 'null'; }
        if($subjects['sub7']){ $subs->sub7 = $subjects['sub7']; }else{ $subs->sub7 = 'null'; }
        if($subjects['sub8']){ $subs->sub8 = $subjects['sub8']; }else{ $subs->sub8 = 'null'; }
        if($subjects['sub9']){ $subs->sub9 = $subjects['sub9']; }else{ $subs->sub9 = 'null'; }
        if($subjects['sub10']){ $subs->sub10 = $subjects['sub10']; }else{ $subs->sub10 = 'null'; }
        if($subjects['sub11']){ $subs->sub11 = $subjects['sub11']; }else{ $subs->sub11 = 'null'; }
        if($subjects['sub12']){ $subs->sub12 = $subjects['sub12']; }else{ $subs->sub12 = 'null'; }

        $subs->last_modified = 'null';
        $subs->save();
        return 'created';
       
        
    }

    public function GetSubs(){
        $table = Timetables::all();
        return TimetablesResource::collection($table);
    }
}
