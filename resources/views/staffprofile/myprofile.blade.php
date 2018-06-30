@extends('layouts.app')

@section('inline-styles')
<style>
#passwordform{
    display: none;
}

</style>
@endsection

@section('content')
            <div class="dashboard" style="margin:30px;">
                 <div class="card">
                     <div class="card-header">
                        <h1>My Profile</h1>
                     </div>
                     <div class="card-body">
                        <ul>
                            <li>{{ $user->name }}</li>
                            <li>{{ $user->role }}</li>
                        </ul>
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
