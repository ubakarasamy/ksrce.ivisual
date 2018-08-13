@extends('layouts.app')

@section('content')
            <div class="dashboard">
                 <my-profile :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></my-profile>
            </div>
@endsection


