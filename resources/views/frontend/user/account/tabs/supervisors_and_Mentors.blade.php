<div class="row">
	<div class="col-sm-6">
		<h3> Supervisors and Mentors</h3>
	</div>
	<div class="col-sm-6">
		<form action="/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					   placeholder="Search for users by either mail or name"> <span class="input-group-btn">
            <button type="submit" class="btn btn-warning">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
			</div>
		</form>

	</div>

</div>



<table class="table table-responsive table-bordered">
	<thead>
		<th>#</th>
		<th>Name</th>
		<th>Email Address</th>
		<th>Add supervisor</th>

		</thead>
		<tr>
            <?php $i = 1 ?>
		@foreach($supervisor as $supervisor)
			<td>{{$i++}}</td>
			<td>{{$supervisor->name}}</td>
			<td>{{$supervisor->email}}</td>
			
			
		
		 <td><p data-placement="top" data-toggle="tooltip" title="Add supervisor"> 
		 <a href="{{url('supervise')}}/{{$supervisor->user_id}}"><button type="button" class="btn btn-success btn-xs">
          ADD <span class="glyphicon glyphicon-plus"></span></button></a> 
		 		
        	</td>

    		 </tr>
        @endforeach

		 
</table>
