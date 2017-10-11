@extends('frontend.layouts.app')
@section('content')
<div class="row">
<div class="col-xs-2"><img src="../img/thrive/thrive-logo.png" alt=""></a></div>
 
        <div class="col-xs-10">
         @if($logged_in_user)
            <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
              <!--<a class="navbar-brand" href="{{URL::to('/')}}">Home</a> -->
              
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
              <li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                <li><a href="{{URL::to('/account')}}">My Account</a></li>
                <li class="active"><a href="{{URL::to('messages')}}">Messages @include('messenger.unread-count')</a></li>
                <li><a href="{{URL::to('messages/create')}}">New Message</a></li>
                
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        @endif
        </div>
        </div>
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                                    </div><!--media-left-->

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Actions</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                     
                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal2" >Public Engagement</a></ul>
                                    
                                     <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                 <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">PUBLIC ENGAGEMENT </h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          
                                                          
  {!! Form::open(array('url'=>'engage')) !!}

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
                         {!! Form::text('audience', null, 
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
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
             
           <br>
           <br>  



           

            
            <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" /> 

            {!!Form::close()!!}  
 
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                           </div>     
                                    
                                    
                                    
                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal1">Add Study Plan</a></ul>
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"> CREATE STUDY PLAN </h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          

                        
                                                          
    <div class="panel panel-info">
        <div class="panel-heading"> RESEARCH PLAN </div>  
         <div class="panel-body"> 
            
                  <label>Number of studies</label>  
                    <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#opt">STUDY ONE</a></li>
                    <li><a data-toggle="tab" href="#opt1"><b>STUDY TWO</b></a></li>
                    <li><a data-toggle="tab" href="#opt2"><b>STUDY THREE</b></a></li>
                    <li><a data-toggle="tab" href="#opt3"><b>STUDY FOUR</b></a></li>  
                    <li><a data-toggle="tab" href="#opt4"><b>STUDY FIVE</b></a></li>    
                    </ul>
                    
                    <div class="tab-content">
                        <div id="opt" class="tab-pane fade in active"> <h3><ul>STUDY ONE</ul></h3>
                        <br>
                        <br>
                        
                        <!--CONTENT-->
                        {!! Form::open(array('url'=>'plan')) !!}
                        <div class="row">
                        <div class="form-group">
                         
                        {!!Form::label('name', 'STUDY TITLE', ['class' => 'control-label col-sm-2'])!!}
                          <div class="col-sm-10">
                         {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','placeholder'=>'study title goes here']) !!}
                          </div>     
                            </div>
                            </div>

                            <div class="form-group">
                            {!!Form::hidden('study_number','studyone',null,['value'=>''])!!}
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
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Anticipated Manuscripts:', ['class' => 'control-label col-sm-4'])!!}
                          {!!Form::selectRange('number_papers','1','10')!!}

                            </div> 
                           </div>
                                 

                           
                             <div class="row">
            <div class="col-sm-2">
            {!! Form::button('Edit', ['class' => 'btn btn-info']) !!}
             </div>   
             <div class="col-sm-8"> </div>  
             <div class="col-sm-2">
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
              </div>
             </div>   


                      {!!Form::close()!!}   
                            
                            
                            
                    </div>
                    
                    
                        <div id="opt1" class="tab-pane fade">
                        <h3>STUDY TWO</h3>
                        <br>
                        <br>
                            <!--CONTENT-->
                                            {!! Form::open(array('url'=>'plan')) !!}
                        <div class="row">
                        <div class="form-group">
                         
                        {!!Form::label('name', 'STUDY TITLE', ['class' => 'control-label col-sm-2'])!!}
                          <div class="col-sm-10">
                         {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','placeholder'=>'study title goes here']) !!}
                          </div>     
                            </div>
                            </div>

                            <div class="form-group">
                            {!!Form::hidden('study_number','studytwo',null,['value'=>'studyone'])!!}
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
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Anticipated Manuscripts:', ['class' => 'control-label col-sm-4'])!!}
                          {!!Form::selectRange('number_papers','1','10')!!}

                            </div> 
                           </div>
                                 

                           
                             <div class="row"> 
             <div class="col-sm-10"> </div>  
             <div class="col-sm-2">
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
              </div>
             </div>   

                      {!!Form::close()!!}  
                        </div>
                   
                        
                        
                        <div id="opt2" class="tab-pane fade">
                        <h3>STUDY THREE</h3>
                            <!--CONTENT-->
                                                {!! Form::open(array('url'=>'plan')) !!}
                        <div class="row">
                        <div class="form-group">
                         
                        {!!Form::label('name', 'STUDY TITLE', ['class' => 'control-label col-sm-2'])!!}
                          <div class="col-sm-10">
                         {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','placeholder'=>'study title goes here']) !!}
                          </div>     
                            </div>
                            </div>

                            <div class="form-group">
                            {!!Form::hidden('study_number','studythree',null,['value'=>'studyone'])!!}
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
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Anticipated Manuscripts:', ['class' => 'control-label col-sm-4'])!!}
                          {!!Form::selectRange('number_papers','1','10')!!}

                            </div> 
                           </div>
                                 

                           
                             <div class="row"> 
             <div class="col-sm-10"> </div>  
             <div class="col-sm-2">
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
              </div>
             </div>   

                      {!!Form::close()!!}  
                        </div>
                  
                        
                        
                        <div id="opt3" class="tab-pane fade">
                        <h3>STUDY FOUR</h3>
                            <!--CONTENT-->
                                           {!! Form::open(array('url'=>'plan')) !!}
                        <div class="row">
                        <div class="form-group">
                         
                        {!!Form::label('name', 'STUDY TITLE', ['class' => 'control-label col-sm-2'])!!}
                          <div class="col-sm-10">
                         {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','placeholder'=>'study title goes here']) !!}
                          </div>     
                            </div>
                            </div>

                            <div class="form-group">
                            {!!Form::hidden('study_number','studyfour',null,['value'=>'studyone'])!!}
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
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Anticipated Manuscripts:', ['class' => 'control-label col-sm-4'])!!}
                          {!!Form::selectRange('number_papers','1','10')!!}

                            </div> 
                           </div>
                                 

                           
                             <div class="row"> 
             <div class="col-sm-10"> </div>  
             <div class="col-sm-2">
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
              </div>
             </div>   

                      {!!Form::close()!!}  
                        </div>
                   
                        
                         
                        <div id="opt4" class="tab-pane fade">
                        <h3>STUDY FIVE</h3>
                        {!! Form::open(array('url'=>'plan')) !!}
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
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('ethical_approval', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
  <br>    
                        <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Collection:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_collection', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>                  


                         
 <br>                  

                       <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Data Analysis:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('data_analysis', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>


<br>                    
                            <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Manuscript Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('manuscript', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                        </div>
                        <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  



<br>                      
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Anticipated Manuscripts:', ['class' => 'control-label col-sm-4'])!!}
                          {!!Form::selectRange('number_papers','1','10')!!}

                            </div> 
                           </div>
                                 

                           
                             <div class="row"> 
             <div class="col-sm-10"> </div>  
             <div class="col-sm-2">
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
              </div>
             </div>   

                      {!!Form::close()!!}  
                        </div>


                

                    
                    
                    
            
                                                          
          </div> 
          </div>                                            
    </div>    
                                                          
          <!-- START DATE , SUBMISSION DATE, PUBLIC DEFENCE(WITH QUATERS EVERY YEAR START WITH 2018) -->                                                
   <div class="row">   

    <div class="col-sm-6">
                <div class="panel panel-success"> 
                                                          <div class="panel-heading"> COURSE COMPLETION SCHEDULE</div>
                                                          
<div class="panel-body">

 {!! Form::open(array('url'=>'course')) !!}


 <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Course Title', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::text('course_name', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'course title',
                                       'class'=>'form-control pull-right')) !!}
         </div>   
    </div>
    </div>

    <br>

   

<div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Course Code', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::text('course_code', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'course code',
                                       'class'=>'form-control pull-right')) !!}
         </div>   
    </div>
    </div>

    <br>


    <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Credit Units', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::selectRange('credit_units', '1','5',null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'credit units',
                                       'class'=>'form-control pull-right')) !!}
         </div>   
    </div>
    </div>
    <br>


     <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Institution', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::text('institution', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Institution',
                                       'class'=>'form-control pull-right')) !!}
         </div>   
    </div>
    </div>

  
<br>
    
    <div class="row">
 
     <div class="form-group">
     <div class="col-sm-4">
    
                  
            {!! Form::label('name', 'Department') !!}
    </div>
    <div class="col-sm-8">
            {!! Form::text('department', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Department',
                                      'class'=>'form-control pull-right')) !!}
      </div>
            
   
</div>
    </div>
  
      <br>
    <br>
     <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Semester', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::select('semster',['one' => 'SEMSTER ONE', 'two' => 'SEMSTER TWO','three'=>'SEMSTER THREE','four'=>'SEMSTER FOUR'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'click to select semester')) !!}
         </div>   
    </div>
    </div>

    <br>

      <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'Year', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::selectYear('year','2018','2025', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'click to select year')) !!}
         </div>   
    </div>
    </div>

    <br>


            <div class="form-group">
                
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              
                </div>
                <br>
        {!!Form::close()!!}                                                   
      </div>
                                                          
  </div>
    </div>
    <div class="col-sm-6">
        
        <div class="panel panel-info"> 
              <div class="panel-heading">SECHDULE MEETING PLAN</div>
             <div class="panel-body">        
             
            {!! Form::open(array('url'=>'meet')) !!}


            <div class="form-group">
                  
         {!! Form::label('name', 'Meeting Title:', ['class' => 'col-md-4 control-label']) !!}
        
            {!! Form::input('title', 'title', null, ['class' => 'form-control']) !!}
            <!--col-md-6-->
            </div>

             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br>
            <div class="form-group">
                  
            {!! Form::label('name', 'Date:', ['class' => 'col-md-4 control-label']) !!}
             {!! Form::date('date', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
            </div><!--col-md-6-->
            

                  

            <div class="form-group">
                  
            {!! Form::label('name', 'Venue:', ['class' => 'col-md-4 control-label']) !!}
                
            
            {!! Form::input('venue', 'venue', null, ['class' => 'form-control']) !!}
            </div><!--col-md-6-->
             


            <div class="form-group">
                  
            {!! Form::label('name', 'Agenda:', ['class' => 'col-md-4 control-label']) !!}
                                       {!!Form::textarea('agenda',null, ['class' => 'form-control','rows'=>5]) !!}
            </div><!--col-md-6-->
           
            <br>
           
               <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
                <br>
                <br>

            
               
                
            {!!Form::close()!!}                                       

            </div>
                   
              </div>          
      
          
    
    </div> <!--col ends here -->
    
</div>       



    <div class="panel-info">
    <div class="panel-heading">DESERTATION WRITING PLAN</div>
    <br>
    <br>
        
            
            <b> <h3>START DATES FOR:</h3></b> 
          {!! Form::open(array('url'=>'activity_create')) !!}



               
                  <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Proposal Development:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('proposal_write', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>

                
                  <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Desertation Writing:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('desertation_write', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>
                        
               
                <div class="row">
                         <div class="form-group">
                           <div class="col-md-2"></div>
                        {!!Form::label('name', 'Desertation Submission:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-6">
                      
                         {!! Form::date('desertation_submit', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'mm/dd/yyyy',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>


              <u> <b>PUBLIC DEFENCE:</b> </u>
               <br>
               <br>
<div class="row">
               <div class="col-sm-6">
               <div class="form-group"> 
                          

      <div class="col-sm-4">
                  
            {!!Form::label('name', 'QUARTERS', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::select('quarters',['first' => '1ST QUARTER', 'second' => '2ND QUARTER','third'=>'3RD QUARTER','fourth'=>'4TH QUARTER'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'click to select quarter')) !!}
         </div> 
                            
                          
                            
               </div>
               </div>

               <div class="col-sm-6">


      
      <div class="form-group">
                           
                        {!!Form::label('name', 'Year:', ['class' => 'control-label col-sm-2'])!!}
                        <div class="col-sm-10">
                        {!! Form::selectYear('year','2018','2025', null, 
                              array('required', 
                                      'class'=>'form-control', 
                       
                                      'placeholder'=>'click to select year')) !!}
                                      </div>

          </div>
                        

      
          
          <br>





               

  </div>
</div>
               <br>


         <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
        {!!Form::close()!!}   
                      


                                                
                                                          
    </div>   

<br>
<br>
    <div class="panel-info">
    <div class="panel-heading">DISSEMINATION PLAN</div>
        <div class="panel-body">

        <form>
            
            <div class="entry input-group col-xs-3">
                        <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
            
        </form>
            

        </div>


    </div>                                                   
                                                          
                                                          
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal3">Research Leadership</a></ul>
                                    
                                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                 <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"> RESEARCH LEADERSHIP </h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          
                                                          
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home1">Supervised Students</a></li>
  <li><a data-toggle="tab" href="#menu12">Schools Visited</a></li>
  <li><a data-toggle="tab" href="#menu23">Research Projects</a></li>
</ul>

<div class="tab-content">
  <div id="home1" class="tab-pane fade in active">
    <h3>Supervised Students</h3>
    <br>
    <br>
    
 {{ Form::open(['link_to_route' => 'study/meet']) }}



         <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'First Name:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('fname', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'First Name',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>

                   <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Last Name:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('lname', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'last name',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>



                   <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Course:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('course', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Course',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>



                   <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Institution:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('level', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Institution enrolled at',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>


                   <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Level:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::select('course',['one' => 'MASTERS', 'two' => 'UNDERGRADUATE'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Click to select',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>



            <div class="row">   
           <div class="form-group">
           <div class="col-sm-8"></div>
               <div class="col-sm-4"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
               </div> 
        {!!Form::close()!!}  
            

  </div>
  <div id="menu12" class="tab-pane fade">
    <h3>Schools Visited</h3>
    

{{ Form::open(['link_to_route' => 'study/meet' ,'class' => 'form-horizontal']) }}

            

            <div class="form-group">
             <div class="col-sm-2">     
            {{ Form::label('School', 'School Name:', ['class' => 'col-md-2 control-label']) }}
                </div>
            <div class="col-sm-10">
            {{ Form::input('School', 'school', null, ['class' => 'form-control']) }}
            </div><!--col-md-6-->
            </div>

             <div class="form-group">
             <div class="col-sm-2">     
            {{ Form::label('name', 'District:', ['class' => 'col-md-2 control-label']) }}
              </div>
            <div class="col-sm-10">
            {{ Form::input('dist','dist',null, ['class' => 'form-control']) }}
            </div><!--col-md-6-->
            </div>  


               
           <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
               <button type="submit" class="btn btn-success">SAVE</button>
              </div>
                </div>
                
             {{Form::close()}} 

  </div>
  <div id="menu23" class="tab-pane fade">
    <h3>Research Projects</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>
                                                        

                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                    
                                    
                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal4">Conferences and Workshops</a></ul>
                                    
                                    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">CONFRENCES AND WORKSHOPS </h4>
                                                      </div>
                                                      <div class="modal-body" style="text-align: center;">
                                                          
                                                          
                                                      COMING SOON 
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                    
                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal5">Personal Development Plan</a></ul>
                                    
                                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"> PERSONAL DEVELOPMENT </h4>
                                                      </div>
                                                      <div class="modal-body" style="text-align: center;">
                                                          
                                                          
                                                      COMING SOON
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                </div><!--panel-body-->
                            </div><!--panel-->

                            
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <P>SUMMARY FOR YOU {{ $logged_in_user->name }}</P>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                        
@if($logged_in_user)

    <div class="col-md-12">
        <h1>{{ $thread->subject }}</h1>

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->name }}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{{ $message->user->name }}</h5>
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
                </div>
            </div>
        @endforeach

        @if(count($file_link) >0) 
        @foreach($file_link as $link)
        <a href="<?php echo asset("storage/$link->file");?>" class="btn btn-success btn-xs" role="button"><i class="fa fa-link"></i> Download Attached File</a>
        @endforeach
        @endif

        <h3>Add a new message</h3>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

        @if(count($users) > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}</label>
            @endforeach
        </div>
        @endif

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif
</div>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection