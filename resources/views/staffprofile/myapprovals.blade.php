@extends('layouts.app')

@section('content')
            <div class="dashboard" >
                 <staff-myapprovals :user-id={{ Auth::user()->id }}></staff-myapprovals>
            </div>
@endsection

