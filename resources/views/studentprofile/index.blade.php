@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <student-profile :userrole={{ Auth::user()->getRole() }} :authenticateduser="{{ Auth::user() }}"></student-profile>
                </div>
            </div>

@endsection
