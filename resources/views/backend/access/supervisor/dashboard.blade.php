@extends ('backend.layouts.app2')
<br>
@section('content')
<div class="panel panel-default"> 

<div class="panel-heading" style="text-align: center;"><h3>Statistics</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-4"> 
<center>
            {!! $chart1->render() !!}
</center>
</div>
<div class="col-sm-4"><center>
            {!! $chart2->render() !!}
</center>
</div>
<div class="col-sm-4"><center>
            {!! $chart4->render() !!}
</center></div>
</div> 
</div>

</div>
<div class="panel panel-default">
<div class="panel-heading" style="text-align: center;"><h3>Supervised Students </h3></div>
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
              <th>view Details</th>
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

        <td><a class="button btn btn-info"> Details </a></td>
           
 </tr>
 @endforeach
 </tbody>
      </table>

</div>

</div>

</div>
</div>

@endsection 
