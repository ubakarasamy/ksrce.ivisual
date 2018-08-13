@extends('layouts.app')

@section('content')

<div class="dashboard" style="margin-top:100px;">
    <h1>Staff Datas</h1>
    <a href="{{ URL::to('downloadStaffExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
       <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importStudentExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="import_file" />
        <button class="btn btn-primary">Import File</button>
    </form>  
    
    <h1>Student Datas</h1>

    <a href="{{ URL::to('downloadStudentExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
    
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importStudentExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="import_file" />
        <button class="btn btn-primary">Import File</button>
    </form> 
</div>
</div>

@endsection
