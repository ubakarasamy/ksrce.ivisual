@extends('layouts.app')

@section('content')
            <div class="dashboard">
                 <approve-leaves :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></approve-leaves>
            </div>
@endsection

