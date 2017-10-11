@extends('frontend.layouts.app')

@section('content')


<div class="panel panel-default">
<div class="panel-heading">Scheduled Pending meetings</div>
<div class="panel-body">
<table class="table table-bordered table-hover">
<thead>
	<tr>
        <th>#</th>
        <th>Meeting Title</th>
        <th>Venue</th>
        <th>Date</th>
        <th>Agenda</th>
        <th>edit</th>
        <th>delete</th>
        <th>Status update</th>
      </tr>
</thead>
    <?php $i = 1 ?>
    @foreach($meet as $index => $meet)
        
        <tr>
        <td>{{ $i++ }}</td>
        <td>{{$meet->title}}</td> 
        <td>{{$meet->venue}}</td>
        <td>{{ Carbon\Carbon::parse($meet->date)->format('F jS, Y') }}</td>
        <td>{!!$meet->agenda !!}</td>
        	

  
        	
       <td>
          <p data-placement="top" data-toggle="tooltip" title="Edit">
          <a href="{{url('editmeet')}}/{{$meet->id}}"><button type="button" class="btn btn-primary btn-xs" data-title="Edit">
        <span class="glyphicon glyphicon-pencil"></span> edit</button></a></p>
          </td>
        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> delete</button></p></td>

        <td>
          <p data-placement="top" data-toggle="tooltip" title="update status">
          <a href="{{url('editstatus_meet')}}/{{$meet->id}}"><button type="button" class="btn btn-success btn-xs" data-title="update status">
        <span class="glyphicon glyphicon-pencil"></span> update status</button></a></p>
          </td>

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

       <a href="{{url('delmeet')}}/{{$meet->id}}"><button type="button" class="btn btn-success">
               <span class="glyphicon glyphicon-check"></span> Delete</button> </a>

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

<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-success">

            <div class="panel-heading">Conferences/Workshops Attended</div>

            <div class="panel-body">

                <table class="table table-striped table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Conference Name</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Comments</th>
                    </tr>

                    <?php $i = 1 ?>
                    @foreach($conf as $conference)
                        <td>{{$i++}}</td>
                        <td>{{$conference->conference_name}}</td>
                        <td>{{$conference->role}}</td>
                        <td>{{$conference->date}} </td>
                        <td>{!!$conference->comment!!}</td>
                        </tr>

                    @endforeach

                </table>
            </div>


        </div>


    </div>

</div>
@endsection