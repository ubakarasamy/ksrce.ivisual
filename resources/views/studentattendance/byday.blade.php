@extends('layouts.app')

@section('content')
<div class="dashboard" >
  <div class="card">
    <div class="card-header">
      <h3>View Attendance</h3>
      <ul class="btn-list">
        <li><a href="{{route('student-attendance-byday')}}" class="btn btn-sm btn-outline-primary active">Day</a></li>
        <li><a href="{{route('student-attendance-bymonth')}}" class="btn btn-sm btn-outline-primary">Month</a></li>
        <li><a href="{{route('student-attendance-byoverall')}}" class="btn btn-sm btn-outline-primary">Overall</a></li>
      </ul>
    </div>
    <div class="card-body">
        <stud-attendance-view  :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></stud-attendance-view>  
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