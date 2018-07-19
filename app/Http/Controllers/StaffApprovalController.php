<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffApproval;
use App\Http\Resources\StaffApprovalResource;
use App\Http\Resources\StaffAtOverallResource;
use Auth;
use App\User;
use App\Academics;
use App\StaffAtOverall;

class StaffApprovalController extends Controller
{
    public function getStatus(Request $request, $id){
        $user = User::findOrFail($id);
        $approvals = StaffApproval::where([['staff_id' , '=', $id]])->get();
        return StaffApprovalResource::collection($approvals);
    }

    public function createApproval(Request $request){

    if($request->isMethod('put')){
        $Aid = $request->input('Aid');
        $status = $request->input('status');
        $A = StaffApproval::findOrFail($Aid);
        $A->status = $status;
        $A->attempt = 1;
        $A->save();
        return 'updated approval';
    
    }else{

        $staffId = $request->input('userId'); //staff id
        $date = $request->input('date');
        $Astaffid = $request->input('AlternativeStaffId');
        $Astaffname = $request->input('AlternativeStaffName');
        $staff = User::findOrFail($staffId);
        $department = $staff->department;
        $approvalFor = $request->input('approvalFor'); //approval for
        $approvalDescription = $request->input('forDescription'); //description
        // approvedby and status will be null at creation
        $approvedBy = null; 
        $status = 3;

        //create  new approval
        $create = new StaffApproval;
        $create->staff_id = $staffId;
        $create->approvalfor = $approvalFor;
        $create->description = $approvalDescription;
        $create->approvedby = $approvedBy;
        $create->status = $status;
        $create->department = $department;
        $create->date = $date;
        $create->attempt = 0;
        $create->alteration_staff_id = $Astaffid;
        $create->alteration_staff_name = $Astaffname;
        $create->save();
        return 'created approval';
    }
}

    public function removeApproval(Request $request){
        $removeId = $request->input('removeId'); //removeId 
        $remove = StaffApproval::findOrFail($removeId);
        $remove->delete();
        return 'removed';
    }

    public function getAllApprovals(){
        $staffApprovals = StaffApproval::all();
        return StaffApprovalResource::collection($staffApprovals);
    }

    public function getMyLimits(Request $request, $userid){
        $uId = $userid;
        $aca = Academics::findOrFail(1);
        $start = $aca->academic_year;

        $dd = StaffAtOverall::where([['staff_id', '=', $uId],['academic_year', '=', $start]])->get();

        return StaffAtOverallResource::collection($dd);
    }

}
