@extends('frontend.layouts.app')

@section('content')
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
</script>

<div class="panel panel-default">
<div class="panel-heading">EDIT STUDY</div>
            <div class="panel-body">
               {!! Form::Model($study, [
              'method' => 'PATCH',
              'url'=>['updatestudy',$study->id]
                                ]) !!}

                        <div class="row">
                        <div class="form-group">
                         
                        {!!Form::label('name', 'STUDY TITLE', ['class' => 'control-label col-sm-2'])!!}
                          <div class="col-sm-10">
                         {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','placeholder'=>'study title goes here']) !!}
                          </div>     
                            </div>
                            </div>

                            <div class="form-group">
                            {!!Form::hidden('study_number','studyfive',null,['value'=>'studyone'])!!}
                            </div>
                                 
                          
                          <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'OBJECTIVES', ['class' => 'control-label col-sm-2'])!!}
                        <div class="col-sm-10">
                         {!! Form::textarea('objectives', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Your Objectives here')) !!}
                          </div>
                        </div>  
                        </div>       

  <br>

                         <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Ethical Approval date:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-4">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'id'=>"date",
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-4">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'id'=>"date",
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-4">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'id'=>"date",
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-4">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'id'=>"date",
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                
                                 

                  

      <div class="row"> 
             
             
             <div class="form-group">
                
              {!! Form::submit('Update', ['class' => 'btn btn-success col-sm-offset-2']) !!}
              </div>
                
              </div>
      {!!Form::close()!!} 
              <br>
              <br>
              </div>
      </div>      
     


      @endsection