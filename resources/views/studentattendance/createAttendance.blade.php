@extends('layouts.app')

@section('content')

            <div class="dashboard" style="margin:30px;">
                   <student-attendance :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></student-attendance>
            </div>
@endsection
