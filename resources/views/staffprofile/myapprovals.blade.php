@extends('layouts.app')

@section('content')
            <div class="dashboard" style="margin:30px;">
                 <staff-myapprovals :user-id={{ Auth::user()->id }}></staff-myapprovals>
            </div>
@endsection

