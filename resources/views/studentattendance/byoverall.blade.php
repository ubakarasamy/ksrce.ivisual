@extends('layouts.app')

@section('content')
<div class="dashboard" >
  <div class="card">
    <div class="card-header">
      <h3>View Attendance</h3>
      <ul class="btn-list">
        <li><a href="{{route('student-attendance-byday')}}" class="btn btn-outline-primary">Day</a></li>
        <li><a href="{{route('student-attendance-bymonth')}}" class="btn btn-outline-primary">Month</a></li>
        <li><a href="{{route('student-attendance-byoverall')}}" class="btn btn-outline-primary active">Overall</a></li>
      </ul>
    </div>
    <div class="card-body">
        {{-- <stud-attendance-view></stud-attendance-view>   --}}
        <stud-attendance-view-byoverall  :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></stud-attendance-view-byoverall>
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