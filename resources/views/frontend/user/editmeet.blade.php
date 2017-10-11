 @extends('frontend.layouts.app')

@section('content')

<div class="panel panel-default">
<div class="panel-heading">EDIT STUDY</div>
            <div class="panel-body">
               {!! Form::Model($study, [
              'method' => 'PATCH',
              'url'=>['updatemeet',$study->id]
             //'route' => ['updatestudy', $study->id]
                                ]) !!}
    <div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
         {!! Form::label('name', 'Meeting Title:', ['class' => ' ']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::input('title', 'title', null, ['class' => 'form-control']) !!}
            <!--col-md-6-->

            </div>
           </div>
	</div>
<br>

	<div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
         {!! Form::label('name', 'Date:', ['class' => 'col-md-4 control-label']) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::date('date', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'id'=>"datepicker",
                                       'class'=>'form-control pull-right')) !!}
            </div>
           </div>
	</div>
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br>
              

        <div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
         {!! Form::label('name', 'Venue:', ['class' => 'col-md-4 control-label']) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::input('venue', 'venue', null, ['class' => 'form-control']) !!}
            </div>
           </div>
		</div>
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br>


            <div class="row">                       
  		<div class="form-group">
  		<div class="col-sm-2">
          {!! Form::label('name', 'Agenda:', ['class' => 'col-md-4 control-label']) !!}
        </div>
        <div class="col-sm-10">
             {!!Form::textarea('agenda',null, ['class' => 'form-control','rows'=>5]) !!}
            </div>
           </div>
		</div>
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                
            <br>
              


          

 
               <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
                <br>
                <br>

            
               
                
            {!!Form::close()!!}  

            </div>
            	</div>


     @endsection                                           
