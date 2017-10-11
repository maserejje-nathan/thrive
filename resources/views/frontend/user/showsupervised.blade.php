@extends('frontend.layouts.app')

@section('content')


<div class="panel panel-default">
<div class="panel-heading">Supervised Students</div>
<div class="panel-body">

<table class="table table-bordered table-hover">
<thead>
	<tr>
        <th>#</th>
        <th>First Name</th> 
        <th>Last Name</th>
        <th>Course</th>
        <th>Level</th>
        <th>Institution</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
</thead>
    <?php $i = 1 ?>
    @foreach($sup as $index => $plan)
        <tr>
        <td>{{ $i++ }}</td>
          <td>{{$plan->fname}}</td>
          <td>{{$plan->lname}}</td>
          <td>{{$plan->course}}</td>
          <td>{{$plan->level}}</td>
          <td>{{$plan->institution}}</td>

        
        	<td>
          <p data-placement="top" data-toggle="tooltip" title="Edit">
          <a href="{{url('#')}}/{{$plan->id}}"><button type="button" class="btn btn-primary btn-xs" data-title="Edit">
        <span class="glyphicon glyphicon-pencil"></span></button></a></p>
        	</td>
    		<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>


        </tr>
   



    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Study</h4>
      </div>
          <div class="modal-body">

      
         
      </div>  
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
 </div>
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this Study</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer">

       <a href="{{url('#')}}/{{$plan->id}}"><button type="button" class="btn btn-success">
        <span class="glyphicon glyphicon-check">Delete</button></a>

        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
 
 @endforeach
</table>
</div>
</div>
@endsection