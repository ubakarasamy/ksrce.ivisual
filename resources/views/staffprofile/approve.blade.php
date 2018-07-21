@extends('layouts.app')

@section('content')
            <div class="dashboard" style="margin:30px;">
                 <approve-leaves :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></approve-leaves>
            </div>
@endsection

