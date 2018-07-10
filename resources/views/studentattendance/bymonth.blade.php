@extends('layouts.app')

@section('content')
<div class="dashboard" style="margin:30px;">

        <div class="card">
                <div class="card-header">
                <h3>View Attendance</h3>
                </div>
                <div class="card-body">


                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Day</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">overall</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                 

        <stud-attendance-view></stud-attendance-view>      
   
</div>

<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
<stud-attendance-view-bymonth></stud-attendance-view-bymonth>

</div>
</div>








</div>
</div>
</div>
@endsection
