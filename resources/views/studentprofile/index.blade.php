@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                   <student-profile :user-role={{ Auth::user()->GetRole() }}></student-profile>
                </div>
            </div>

@endsection
