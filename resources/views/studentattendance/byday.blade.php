@extends('layouts.app')

@section('content')
<div class="dashboard" style="margin:30px;">
  <div class="card">
    <div class="card-header">
      <h1>View Attendance</h1>
      <ul class="btn-list">
        <li><a href="{{route('student-attendance-byday')}}" class="btn btn-outline-primary active">Day</a></li>
        <li><a href="{{route('student-attendance-bymonth')}}" class="btn btn-outline-primary">Month</a></li>
        <li><a href="{{route('student-attendance-byoverall')}}" class="btn btn-outline-primary">Overall</a></li>
      </ul>
    </div>
    <div class="card-body">
        <stud-attendance-view></stud-attendance-view>  
        {{-- <stud-attendance-view-bymonth></stud-attendance-view-bymonth> --}}
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