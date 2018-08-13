@extends('layouts.app')

@section('content')

            <div class="dashboard">
                    <staff-profile :user-role={{ Auth::user()->GetRole() }}></staff-profile>
                </div>
            </div>

@endsection
