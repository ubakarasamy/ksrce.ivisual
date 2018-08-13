@extends('layouts.app')

@section('content')
            <div class="dashboard">
                <time-tables :userrole={{ Auth::user()->id }} :authenticateduser="{{ Auth::user() }}"></time-tables>
            </div>
@endsection

