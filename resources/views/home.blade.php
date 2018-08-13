@extends('layouts.app')

@section('content')
            <div class="dashboard">
                        <div class="row">
                            <div class="col-md-3">
                                    <div class="home_profiles card">
                                            <center>
                                            <i class="fas fa-user"></i>
                                            <p class="title">Staff Profiles</p>
                                            <h1>{{ $data['staff_total'] }}</h1>
                                            <p class="count">Total Count</p>
                                            </center>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="home_profiles card">
                                            <center>
                                                    <i class="fas fa-graduation-cap"></i>
                                                    <p class="title">Student Profiles</p>
                                                    <h1>{{ $data['student_total'] }}</h1>
                                                    <p class="count">Total Count</p>
                                            </center>
                                    </div>
                            </div>
                            
                        </div>
                        
                    </div>
       
@endsection
