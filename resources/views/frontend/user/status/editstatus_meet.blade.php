 @extends('frontend.layouts.app')

@section('content')

<div class="panel panel-default">
<div class="panel-heading">EDIT STATUS</div>

<div class="panel-body">
               {!! Form::Model($meet, [
              'method' => 'PATCH',
              'url'=>['updatestatus_meet',$meet->id],
              'files' => true
             //'route' => ['updatestudy', $study->id]
                                ]) !!}
    <div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
         {!! Form::label('name', 'Meeting Title:', ['class' => ' ']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::input('title', 'title', null, ['class' => 'form-control','readonly' => true]) !!}
            <!--col-md-6-->

            </div>
           </div>
	</div>
<br>

	<div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
         {!! Form::label('name', 'Comments', ['class' => 'col-md-4 control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::textarea('comment', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'comments here',
                                       'class'=>'form-control pull-right',
                                       'rows'=>5)) !!}
            </div>
           </div>
	</div>

             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br> 
              <div class="form-group">
                            {!!Form::hidden('activity_type','meeting',null,['value'=>''])!!}
                            </div>
          


            <div class="row">                       
  		<div class="form-group">
  		
          {!! Form::label('name', 'Meeting status', ['class' => 'col-md-2 control-label']) !!}
        
        <div class="col-sm-10">
             {!!Form::select('status',['1' => 'Complete', '0' => 'Not Complete'],null,
             						array(
             						 'class' => 'form-control',
             						 )) !!}
            </div>
           </div>
		</div>
            
            <br>
              
  <div class="row">                       
  		<div class="form-group">
  		
          {!! Form::label('name', 'Attach minutes:', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-8">
             {!!Form::file('minutes',null, ['class' => 'form-control','class'=>'btn btn-success']) !!}
            </div>
           </div>
		</div>
            
            <br>
               <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Update Status', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
                <br>
                <br>

            
               
                
            {!!Form::close()!!}  

            </div>
            	</div>





@endsection