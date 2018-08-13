@extends('layouts.app')

@section('content')
            <div class="dashboard">
                        <div class="row">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Laravel 5 maatwebsite export into csv and excel and import into DB</div>
                                 <div class="panel-body"> 
                                     
                                 <form action="{{route('import-csv-excel')}}">
                                       <div class="row">
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                               <div class="form-group">
                                                   <div class="col-md-9">
                                                       <input type="file" name="sample_file" id="sample_file">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                           <button type="submit">Submit</button>
                                           </div>
                                       </div>
                                    </form>
                                </div>
                               </div>
                            
                        </div>
                        
                    </div>
       
@endsection
