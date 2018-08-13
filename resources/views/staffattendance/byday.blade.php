@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                             Staff Attendance by day
                           </h3>
                           <ul class="btn-list">
                            <li><a href="{{route('staff-attendance-day')}}" class="btn btn-sm btn-outline-primary active">Day</a></li>   
                            <li><a href="{{route('staff-attendance-month')}}" class="btn btn-sm btn-outline-primary">Month</a></li>
                            <li><a href="{{route('staff-attendance-overall')}}" class="btn btn-sm btn-outline-primary">Overall</a></li>
                          </ul>
                       </div>
                       <div class="card-body">
                            <staffattendance-byday></staffattendance-byday>
                        </div>
                   </div>
            </div>

          
@endsection


<style scoped>
    .btn-list
    {
      padding-top: 15px;
    }
    .btn-list li
    {
      display: inline;
    }
  </style>