<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffApproval;

class StaffApprovalController extends Controller
{
    public function createApproval(Reqest $request){
        $staff = auth()->user(); //get logged in user  
        $staffId = $staff->id; //staff id
        $approvalFor = $request->input('approvalFor'); //approval for
        $approvalDescription = $request->input('forDescription'); //description
        $approvedBy = false;

        $create = new StaffApproval;
        $create->staff_id = $staffId;
        $create->approvalfor = $approvalFor;
        $create->decsription = $approvalDescription;
        $create->approvedby = $approvedBy;
        $create->save();
    }
}
