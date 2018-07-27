@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <student-bgroup :userrole={{ Auth::user()->getRole() }} :authenticateduser="{{ Auth::user() }}"></student-bgroup>
                </div>
            </div>

@endsection
