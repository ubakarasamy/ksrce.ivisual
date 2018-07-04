<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffApproval;
use App\Http\Resources\StaffApprovalResource;
use Auth;
use App\User;

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

}
