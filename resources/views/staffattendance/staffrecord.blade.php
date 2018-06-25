@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                            {{ $datas['date'] }} Attendance 
                           </h3>
                       </div>
                       <div class="card-body">
                       <h1>{{ $datas['attendancedata']->count() }}</h1>

                       <ul>
                       @foreach($datas['staffs'] as $staff)
                       <li>{{ $staff->eid }} and {{ $staff->name }} </li>
                       @endforeach
                    </ul>
                        </div>
                   </div>
            </div>
@endsection
