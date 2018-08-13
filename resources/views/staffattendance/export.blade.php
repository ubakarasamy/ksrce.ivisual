@extends('layouts.app')

@section('content')

            <div class="dashboard">
                   <div class="card">
                       <div class="card-header">
                           <h2>Export Staff Attendance</h2>
                       </div>
                       <div class="card-body">
                            <form action="/staff/exportMonth" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label for="fromDate">From Date</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control mb-2" style="width:180px;"/>
                                <label for="fromDate">To Date</label>
                                <input type="date" name="toDate" id="toDate" class="form-control mb-2" style="width:180px;"/>
                                <button class="btn btn-primary" type="submit">
                                    Export
                                </button>
                            </form>
                       </div>
                   
                   </div>
            </div>
@endsection
