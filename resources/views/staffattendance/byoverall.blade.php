@extends('layouts.app')

@section('content')

            <div class="dashboard" >
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                             Staff Attendance Overall
                           </h3>
                           <ul class="btn-list">
                            <li><a href="{{route('staff-attendance-month')}}" class="btn btn-outline-primary">Month</a></li>
                            <li><a href="{{route('staff-attendance-overall')}}" class="btn btn-outline-primary active">Overall</a></li>
                          </ul>
                       </div>
                       <div class="card-body">
                            <staffattendance-byoverall></staffattendance-byoverall>
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