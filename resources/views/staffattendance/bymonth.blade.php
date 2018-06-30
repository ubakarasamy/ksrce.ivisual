@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                             Attendance by month
                           </h3>
                       </div>
                       <div class="card-body">
                            <staffattendance-bymonth></staffattendance-bymonth>
                        </div>
                   </div>
            </div>
@endsection
