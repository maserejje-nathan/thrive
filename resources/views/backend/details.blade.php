@extends('backend.layouts.app')


@section('content')  

@foreach ($user as $name) 

<div class="row">  
	
<div class="col-sm-12">
         
	<div class="panel panel-info">
		<div class="panel panel-heading"> UNIVERSITY REQUIREMENTS for {{ strtoupper($name->name)}} </div>
@endforeach
		<div class="panel-body">

		<div class="row">

		<div class="col-sm-6">
		<div class="panel">
		<div class="panel-body">
			
		 <table class="table table-striped table-hover table-bordered">
		 	<tr>
		 		<th>
		 			Registration status :
		 		</th>
		 		@foreach( $user as $usr)
		 		
		 		@if($usr->regstatus == 1)
		 		<td>
		 		<button class="btn btn-success">COMPLETE</button>	
		 		</td>
		 		@else
		 		<td>
		 		<button class="btn btn-warning">PARTIAL</button>	
		 		</td>
		 		@endif
		 		
		 	</tr>
		 	<tr>
		 		
		 	</tr>
		 	<tr>
		 	<th>
		 		Research Topic:
		 	</th>
		 		<td> {{$usr->topic}} </td>
		 	
		 	</tr>	
		 	<tr>
		 	<th>
		 		Institution:
		 	</th>
		 		<td> {{$usr->institution}} </td>
		 	
		 	</tr>
		 	<tr>
		 	<th>
		 		Degree Type:
		 	</th>
		 		<td> {{$usr->researchtype}} </td>
		 	
		 	</tr>
		 	<tr>
		 	<th>
		 		College:
		 	</th>
		 		<td> {{$usr->college}} </td> 
		 	
		 	</tr>

		 	<tr>
		 	<th>
		 		School:
		 	</th>
		 		<td> {{$usr->school}} </td>
		 	
		 	</tr>

		 	<tr>
		 	<th>
		 		Department:
		 	</th>
		 		<td> {{$usr->deparment}} </td>
		 	
		 	</tr>					
		 	
		 	@endforeach
		 </table>

		</div>
		</div>	
	</div>
		<div class="col-sm-6">
		<div class="panel panel-info">
		<div class="panel-heading">Fellow Supervisors</div>
		<div class="panel-body">
		<table class="table table-striped table-bordered">

		<tbody>

			<th>#</th>
			<th>Name</th>
			<th>Email</th>
            <?php $i = 1 ?>
			@foreach($mine as  $index=>$felo)

			<tr>
				<td>{{$i++}}</td>
				<td>
				{{$felo->name}}
				</td>
				<td>
				{{$felo->email}}
				</td>
				
			</tr>
			@endforeach
			</tbody>
		</table>
		</div>
		</div>
				<div class="panel panel-info">
			<div class="panel-heading">COURSES PLANNED</div>
		<div class="panel-body">
			 <table class="table table-striped table-hover table-bordered">
			 <th>#</th>
			 <th>Course Name</th>
			 <th>Study Type</th>
			 <th>Planned Year of study</th>
			 <th>Quarter</th>
			 <th>Status</th>
                 <?php $i = 1 ?>
			 @foreach($course as $index =>$crse)
			 <tr>
			 <td>{{$i++}}</td>
			 <td>{{$crse->course_name}}</td>
			 <td>{{$crse->type}}</td>
			 <td>{{$crse->year}}</td>
			 <td>{{$crse->semster}}</td>
			 @if($crse->status == 0)
			 <td><button class="btn btn-warning btn-xs">pending</button></td>
			 @else
			 <td><button class="btn btn-success btn-xs">complete</button></td>
			 @endif	
			 </tr>
			 @endforeach
			 </table>

		</div>
			
		</div>
		</div>
		</div>	

		
		</div>

	</div>

</div>

</div>

<div class="row">

<div class="col-sm-12">
	<div class="panel panel-info">
		<div class="panel panel-heading"> RESEARCH</div>

		<div class="panel-body">
			
<div class="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">

        @foreach($serve as $count => $serves)

            <li role="presentation" @if($count == 0) class="active" @endif>
                <a href="#tab-{{ $serves->id }}" aria-controls="#tab-{{ $serves->id }}" role="tab" data-toggle="tab"><b>{{ strtoupper($serves->study_number)}}</b></a
            </li>

        @endforeach 
    
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        @foreach($serve as $count => $serves)

            <div role="tabpanel" @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{ $serves->id }}">

           <h3>Study Name: <u> {{$serves->study_name}} </u></h3>

            <br>
            <h5>PROPOSED DATES FOR:</h5>
	      <div class="table-responsive">
				  <table class="table table-striped table-bordered">
				  <tr>
				  <th>Ethical Approval</th>
				  <th>Data Collection</th>
				  <th>Data Analysis</th>
				  <th>Manuscript Writing</th>
				  </tr>

				  <tr>
				  <td>{{ Carbon\Carbon::parse($serves->ethical_approval)->format('F jS, Y') }}</td>
				  <td>{{ Carbon\Carbon::parse($serves->data_collection)->format('F jS, Y') }}</td>
				  <td>{{ Carbon\Carbon::parse($serves->data_analysis)->format('F jS, Y') }}</td>

				  <td>{{ Carbon\Carbon::parse($serves->manuscript)->format('F jS, Y') }}</td>

				  </tr>
				  </table>
			</div>

	<div class="well">Number of Papers to be witten: <h3>{{$serves->number_papers}}</div>	
          
         
            
  

<div class="panel panel-info">
<div class="panel-heading">Status report</div>
<div class="panel-body">

@if ( $serves->ethics_status == 0)
<div class="row">
<div class="col-sm-4">Ethical Approval</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    0% pending
  </div>
</div>
</div>
</div> 
@else

<div class="row">
<div class="col-sm-4">Ethical Approval</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-success " role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100% complete
  </div>
</div>
</div>
</div>
@endif




@if ( $serves->collection_status == 0)
<div class="row">
<div class="col-sm-4">Data collection</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    0% pending
  </div>
</div>
</div>
</div> 
@else

<div class="row">
<div class="col-sm-4">Data collection</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-success " role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100% complete
  </div>
</div>
</div>
</div>
@endif


@if ( $serves->analysis_status == 0)
<div class="row">
<div class="col-sm-4">Data Analysis</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    0% pending
  </div>
</div>
</div>
</div> 
@else

<div class="row">
<div class="col-sm-4">Data Analysis</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100% complete
  </div>
</div>
</div>
</div>
@endif

@if ( $serves->man_status == 0)
<div class="row">
<div class="col-sm-4">Manuscript Writing</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    0% pending
  </div>
</div>
</div>
</div> 
@else

<div class="row">
<div class="col-sm-4">Mnauscript Writing</div>

<div class="col-sm-8">
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100% complete
  </div>
</div>
</div>
</div>
@endif






</div>
	
</div>
            </div>

        @endforeach 
        
    </div>

</div>
		</div>

	</div>

</div>
</div>

<div class="row">
	


<div class="col-sm-12">
	<div class="panel panel-info">
		<div class="panel panel-heading">PUBLIC ENGAGEMENT</div>

		<div class="panel-body">
			
			<table class="table table-striped table-bordered">
    <tbody>
    	<th>#</th>
        <th>Engagement Type</th>
        <th>Audience</th>
        <th>Frequency</th>
        <th>Year</th>
        <th>Comments</th>
@if(count($engage) ==0 )

<tr>     
        <td></td>
	    <td>Nothing here <i class="fa fa-frown-o" aria-hidden="true"></i></td>
		<td>Nothing here <i class="fa fa-frown-o" aria-hidden="true"></i></td>
		<td>Nothing here <i class="fa fa-frown-o" aria-hidden="true"></i></td>
		<td>Nothing here <i class="fa fa-frown-o" aria-hidden="true"></i></td>
		<td>Nothing here <i class="fa fa-frown-o" aria-hidden="true"></i></td>

</tr>

@else
    <?php $i = 1 ?>
        @foreach($engage as $index => $en)
         <tr>
         <td>{{$i++}}</td>
        	 <td>
        	 {{$en->engage_type}}
        	</td>
        	<td>
        	 {{$en->audience}}
        	</td>
        	<td>
        	 {{$en->frequency}}
        	</td>
        	<td>
        	 {{ strtoupper($en->year)}}
        	</td>
        	<td>
        	 {{$en->comments}}
        	</td>
        	</tr>
        @endforeach	
        
 @endif
    </tbody>
</table>
		</div>

	</div>

</div>
</div>



<div class="row">
	
<div class="col-sm-12">
	<div class="panel panel-info">
		<div class="panel panel-heading"> RESEARCH MANUSCRIPTS</div>

		<div class="panel-body">

<table class="table table-stripped table-hover table-bordered">

<tr>
	<th>#</th>
	<th>Title</th>
	<th>Manuscript Authors</th> 
	<th>Journal</th>
	<th>Volume</th>
	<th>Issue</th>
	<th>Pages</th>
	<th>Status</th>
</tr>
    <?php $i = 1 ?>
@foreach($publish as $index =>$p) 
<tr>
<td>{{ $i++ }}</td>
<td>{{$p->title}}</td>	
<td>{{$p->citation}}</td>
<td>{{$p->journal}}</td>
<td>{{$p->volume}}</td>
<td>{{$p->issue}}</td>
<td>{{$p->pages}}</td>
<td>{{$p->status}}</td>
</tr>
	
@endforeach
</table>
			
		</div>

	</div>

</div>

</div>

<div class="row">
	
<div class="col-sm-12">
	<div class="panel panel-info">
		<div class="panel panel-heading">MEETINGS AND THIER STATUS</div>

		<div class="panel-body">
			
			<table class="table table-striped table-bordered">
				
			<tbody>

			    <th>#</th>
				<th>TITLE</th>
				<th>VENUE</th>
				<th>AGENDA</th>
				<th>STATUS</th>
				<th>MINUTES</th>
				<?php $i = 1 ?>
				@foreach($meet as  $met)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$met->title }}</td>
					<td>{{$met->venue}}</td>
					<td>{{$met->agenda}}</td>
					@if( $met->status  == 0)
					<td><button class="btn btn-warning btn-xs"> PENDING <i class="fa fa-clock-o "></i></button></td>
					@else
						<td><button class="btn btn-success btn-xs">COMPLETE <i class="fa fa-check"></i></button></td>
						<td><a href="<?php echo asset("storage/$met->minutes");?>" class="btn btn-info btn-xs">MINUTES DOWNLOAD <i class="fa fa-paperclip"></i></a></td>

					@endif
				</tr>
				@endforeach
			</tbody>

			</table>
		</div>

	</div>

</div>

</div>


<div class="panel panel-success">

		<div class="panel-heading">Exciting Moments</div>

		<div class="panel-body">
			
			<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Date</th>
				<th>Comment</th>
			</tr>
                <?php $i = 1 ?>
    @foreach($moment as $index=> $mom)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$mom->name}}</td>
				<td>{{$mom->date}}</td>
				<td>{{$mom->comment}} </td>
			</tr>
				
    @endforeach 

			</table>
		</div>
	

</div>

<div class="panel panel-success">

		<div class="panel-heading"> <h3>Research Leadership </h3></div>

		<div class="panel-body">

		<div class="row">
		<div class="col-sm-6">	

		<h4>Schools Visited</h4>
		<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>School Name</th>
				<th>District / Region</th>
				<th>Comment</th>
			</tr>
            <?php $i = 1 ?>
    @foreach($school_visit as $index=>$visit)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$visit->school}}</td>
				<td>{{$visit->dist}}</td>
				<td>{{$visit->comment}} </td>
			</tr>
				
    @endforeach

			</table>

		</div>	

		<div class="col-sm-6"> 

		<h4> Research Projects</h4>

				<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>Project Name</th>
				<th>My Role</th>
				<th>Institution </th>
				<th>Comments </th>
			</tr>
                    <?php $i = 1 ?>
    @foreach($res_projects as $index=>$project)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$project->prog_name}}</td>
				<td>{{$project->role}}</td>
				<td>{{$project->institute}} </td>
				<td>{{$project->comment}}</td>
			</tr>
				
    @endforeach

			</table>

		</div>	

		</div>
			 


			<h4>Supervised Students</h4>
		<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>First Name </th>
				<th>Last Name </th>
				<th>Course </th>
				<th>Level </th>
			</tr>
            <?php $i = 1 ?>
    @foreach($supervised as $index=>$sup_student)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$sup_student->fname}}</td>
				<td>{{$sup_student->lname}}</td>
				<td>{{$sup_student->course}} </td>
				<td>{{$sup_student->level}} </td>
			</tr>
				
    @endforeach

			</table>
			
		</div>
	

</div>



<div class="panel panel-success">

		<div class="panel-heading">Conferences Atended</div>

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
				<td>{{$conference->comment}}</td>
			</tr>
				
    @endforeach

			</table>
		</div>
	

</div>


<div class="panel panel-success">

		<div class="panel-heading">Personal Development plan</div>

		<div class="panel-body">
			
			<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>From</th>
				<th>To</th>
				<th>Individual development goal</th>
				<th>Individual development objectives</th>
				<th>Individual Development Activities</th>
				<th>Target Date</th>
				<th>Evidence of achievement</th>
				<th>Date achieved</th>
			</tr>
                <?php $i = 1 ?>
    @foreach($pdp as $index=>$personal)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$personal->from}}</td>
				<td>{{$personal->to}}</td>
				<td>{{$personal->goal}} </td>
				<td>{{$personal->objective}}</td>
				<td>{{$personal->target}}</td>
				<td>{{$personal->time_frame}} </td>
				<td>{{$personal->evidence}}</td>
				<td>{{$personal->achieve}} </td>
			</tr>
				
    @endforeach

			</table>
		</div>
	

</div>

@endsection