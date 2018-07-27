@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <student-attendance :userrole={{ Auth::user()->getRole() }} :authenticateduser="{{ Auth::user() }}"></student-attendance>
            </div>
@endsection
