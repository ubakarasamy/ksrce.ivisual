@extends('layouts.app')

@section('inline-styles')
<style>
#passwordform{
    display: none;
}

</style>
@endsection

@section('content')
            <div class="dashboard">
                 <div class="card col-md-6">
                     <div class="card-header">
                        <h1>My Profile</h1>
                     </div>
                     <div class="card-body">
                     <img src="{{asset('img/profile_default_pic.png')}}" alt="staff image" class="mx-auto d-block" style="width: 135px;border-radius: 7%;margin: 10px;">
                        <table class="table" style="text-transform:uppercase;">
                          <tr><td>Name:</td><td>{{$user->name}}</td></tr>
                          <tr><td>Department:</td><td>{{$user->department}}</td></tr>
                          <tr><td>Designation:</td><td>{{$user->occupation}}</td></tr>
                          <tr><td>Employee ID:</td><td>{{$user->eid}}</td></tr>
                          <tr><td>Joined On:</td><td>{{$user->mojoined}}</td></tr>
                        </table>
                        <button class="btn btn-primary" id="change_password">Change Password</button>
                    
                        <div class="change-passwordform" id="passwordform">
                                <form action="" method="post">
                                    <input type="password" class="form-control col-md-3" name="password" id="" placeholder="new password">
                                    <button type="submit" class="btn btn-primary ml-4">Save</button>
                                </form>
                        </div>
                    </div>
                 </div>
            </div>
            
            

@endsection

@section('scripts')
<script>
        let ChangeBtn = document.querySelector('#change_password');
        let ChangeForm = document.querySelector('#passwordform');
     ChangeBtn.addEventListener('click', function(){
        
        ChangeBtn.style.display = "none";
        ChangeForm.style.display = "block";
     });
     </script>
@endsection
