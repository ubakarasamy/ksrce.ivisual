@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <staff-attendance  :userrole={{ Auth::user()->getRole() }} :authenticateduser="{{ Auth::user() }}"></staff-attendance>
            </div>
@endsection
