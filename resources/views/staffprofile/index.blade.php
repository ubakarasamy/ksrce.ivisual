@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                    <staff-profile :user-role={{ Auth::user()->GetRole() }}></staff-profile>
                </div>
            </div>

@endsection
