@extends('layouts.app')

@section('content')
            <div class="dashboard">
                   <create-subjects  :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></create-subjects>
                </div>
            </div>

@endsection
