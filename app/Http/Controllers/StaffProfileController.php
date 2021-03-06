<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Image;
use App\User;
use App\Role;
use Auth;
use App\Http\Resources\UserResource;

class StaffProfileController extends Controller
{
    public function getAuthUser(){
        $user = User::findOrFail(1);
        return UserResource::collection($user);
    }
    public function showPage(){
        return view('staffprofile.index');
    }

    public function index(){
        $staffs = User::all();
       // Return collection of Users as a resource
       return UserResource::collection($staffs);
   }


   public function show($id)
   {
       // Get article
       $staff = User::findOrFail($id);
       // Return single article as a resource
       return new UserResource($staff);
   }

   public function changePassword(Request $request){
    //Update Request
    if($request->input('change_pwd')){
     $staff = User::findOrFail($request->user_id);
     $staff->password = Hash::make($request->input('password'));
     $staff->save();
    }
    return response()->json('password updated');
   }

   public function store(Request $request){

       if($request->isMethod('put')){
           //Update Request
           
           $staff = User::findOrFail($request->user_id);
           $staff->id = $request->input('user_id');
           $staff->name = $request->input('name');
           $staff->email = $request->input('email');
           $staff->password = Hash::make($request->input('password'));
           $staff->department = $request->input('department');
           $staff->mojoined = $request->input('mojoined');
           $staff->eid = $request->input('eid');
           $staff->role = $request->input('occupation');
           $staff->profile_url = $request->input('profile_url');
           $staff->save();

           $role = Role::where('name', $request->input('role'))->first();
           $staff->roles()->attach($role);

           if($staff->save()) {
               return new UserResource($staff);
           }
        
       }else{
           //Create Request
                $staff = new User;
                $staff->name = $request->input('name');
                $staff->email = $request->input('email');
                $staff->password = Hash::make($request->input('password'));
                $staff->department = $request->input('department');
                $staff->mojoined = $request->input('mojoined');
                $staff->eid = $request->input('eid');
                $staff->role = $request->input('occupation');
                $staff->departmentFor = $request->input('departmentfor');
                $staff->profile_url = $request->input('profile_url');
                // if($request->file('pic')){

                    // $image =  $request->file('pic');
                    // $filename = time() . '.' . $image->getClientOriginalExtension();
                    // $location = public_path('img/staffpic/' . $filename);
                    // Image::make($image)->resize(800, 400)->save($location);
                    // $staff->image = $filename;
                  
                // }
          

                $staff->save();

                $staffrole = Role::where('name', $request->input('role'))->first();
                $staff->roles()->attach($staffrole);

           if($staff->save()) {
               return new UserResource($staff);
           }
       }
       
    }
       public function showStaffProfile(){
        $user = auth()->user();
           return view('staffprofile.myprofile')->with('user', $user);
       }


       public function showMyApprovals(){
           
           return view('staffprofile.myapprovals');
       }

       public function Approve(){
        return view('staffprofile.approve');
    }
      
   
}
