@extends('backend.layouts.app')

@section('page-header')
{!! Charts::assets() !!}
    <h1>
        {{ app_name() }}
        <small>{{ trans('Dashboard') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

<div class="panel panel-default">
<div class="panel-heading" style="text-align: center;"><h3>Supervised and Mentored Students</h3></div>
<div class="panel-body">
<div class="row">
  <div class="col-sm-12">
      
      <table class="table table-bordered">
        <thead>
          <tr>
              <th>#</th>
              <th data-field="name">Name</th>
              <th data-field="email">Email</th>
              <th data-field="college">College</th>
              <th data-field="school">School</th>
              <th data-field="department">Department</th>
              <th data-field="snumber">Student Number</th>
              <th data-field="institution">Institution</th>
              <th data-field="institution">View Details</th>
              <th data-field="institution">Print</th>
          </tr>
        </thead>
        <tbody>

        @foreach($meet as $index => $meet)
        
        <tr>
        <td>{{ $index +1 }}</td> 
        <td>{{$meet->name}}</td> 
        <td>{{$meet->email}}</td>
        <td>{{$meet->college}}</td>
        <td>{{$meet->school}}</td>
        <td>{{$meet->department}}</td>
        <td>{{$meet->snumber}}</td>
        <td>{{$meet->institution}}</td>
        <td><a href="{{'supervised_students'}}/{{$meet->user_id}}" class="btn btn-info" role="button">Details</a></td>
        <td><a href="{{'print_report'}}/{{$meet->user_id}}" class="btn btn-success">Print Report <i class="fa fa-print"></i></a></td>
           
 </tr>
 @endforeach
 </tbody>
      </table> 

</div>

</div>

</div>
</div>        
            
<div class="panel panel-default"> 
 
<div class="panel-heading" style="text-align: center;"><h3>Statistics</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-4"> 
<center>
           
</center>
</div>
<div class="col-sm-4"><center>
           
</center>
</div>
<div class="col-sm-4"><center>
           
</center>
</div>
</div> 
</div>

</div>


        </div><!-- /.box-body -->
    </div><!--box box-success-->

    
@endsection