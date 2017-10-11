@extends('frontend.layouts.app')

@section('content')

<div class="panel panel-default">
<div class="panel-heading">Pending Courses</div>
<div class="panel-body">
{{ csrf_field() }}
<table class="table table-bordered table-hover">
<thead>
	<tr>
        <th>#</th>
        <th>Course Name</th>
        <th>Course Code</th>
        <th>Credit Units</th>
        <th>Institution</th>
        <th>Department</th>
        <th>Quarter</th>
        <th>Year</th>
        <th>status</th>
        
        <th>edit</th>
        <th>delete</th>  
      </tr>
</thead>
    <?php $i = 1 ?>
    @foreach($course as $index => $courses)
        <tr class="courses">
          <td>{{ $i++ }}</td>
          <td>{{$courses->course_name}}</td> 
        	<td>{{$courses->course_code}}</td>
        	<td>{{$courses->credit_units}}</td>
        	<td>{{$courses->institution}}</td>
        	<td>{{$courses->department}}</td>
        	<td>{{$courses->semster}}</td>
          <td>{{$courses->year}}</td>
          @if($courses->status == 0)
          <td><button class="btn btn-warning">PENDING</button></td>
          @else
          <td><button class="btn btn-success">COMPLETE</button></td>
          @endif


 
        <td>
          <p data-placement="top" data-toggle="tooltip" title="Edit">
          <a href="{{url('editcourse')}}/{{$courses->id}}"><button type="button" class="btn btn-primary btn-xs" data-title="Edit">
        <span class="glyphicon glyphicon-pencil"></span></button></a></p>
          </td>
        <td>
       <a href="#" class="btn btn-danger btn-xs">
              <span class="glyphicon glyphicon-trash"></span> Delete
            </a>


        </td>

        </tr>
     
 @endforeach 

      
</table>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="deleteContent">
            Are you Sure you want to delete <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
</div>

</div>
  
@endsection
