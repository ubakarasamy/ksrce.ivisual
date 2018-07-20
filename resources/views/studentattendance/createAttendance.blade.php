@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                   <student-attendance :user-role={{ Auth::user()->getRole() }}></student-attendance>
            </div>
@endsection
