@extends('frontend.layouts.app')

@section('content')

<div class="panel panel-default">
<div class="panel-heading">EDIT Course</div>
            <div class="panel-body">
               {!! Form::Model($study, [
              'method' => 'PATCH', 
              'url'=>['updateengage',$study->id]
             //'route' => ['updatestudy', $study->id]
                                ]) !!}
<div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Engagement Type', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                         {!! Form::text('engage_type', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Type of engagement')) !!}
                          </div>
                        </div>  
          </div> 
          <br>


          <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Audience', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                         {!! Form::select('audience',['Academicians'=>'Academicians','Media/Civil Society'=>'Media/Civil Society','General public'=>'General Public','Schools'=>'Schools','Policy Makers'=>'Policy Makers'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Audience')) !!}
                          </div>
                        </div>  
          </div> 

<br>
          <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Frequency', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-4">
                         {!! Form::number('frequency', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'1')) !!}
                          </div>
                        </div> 

                        <div class="col-sm-4"></div> 
          </div> 
          <br>

            <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Year', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-4">
                         {!! Form::select('year',['one' => 'YEAR ONE', 'two' => 'YEAR TWO','three'=>'YEAR THREE','four'=>'YEAR FOUR'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'click to select year')) !!}
                          </div>
                        </div> 

                        <div class="col-sm-4"></div> 
          </div> 
          <br>
           <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Comments', ['class' => 'control-label col-sm-4'])!!}
                        <div class="col-sm-8">
                         {!! Form::textarea('comments', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'comments go here')) !!}
                          </div>
                        </div> 

                       
          </div> 

<br>

         
            
            
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
             
           <br>
           <br>  



           

            
            <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" /> 

            {!!Form::close()!!}  

@endsection
