@extends('frontend.layouts.app')

@section('content')
    <div class="row">
<div class="col-xs-2"><img src="img/thrive/thrive-logo.png" alt=""></div>
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
                                   <button class="btn default">FELLOW ACADEMIC PROGRAM DETAILS</button>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                     
                                    
                                    
                                    
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

                                  {!! Form::label('objectives', 'OBJECTIVES:', ['class' => 'col-md-2 control-label']) !!}
                                  <div class="col-md-10">
                                  {!!Form::textarea('objectives',null, ['class' => 'form-control','rows'=>5]) !!}

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
                                 

                           
             <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
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

                                    {!! Form::label('objectives', 'OBJECTIVES:', ['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!!Form::textarea('objectives',null, ['class' => 'form-control','rows'=>5]) !!}

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

                                    {!! Form::label('objectives', 'OBJECTIVES:', ['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!!Form::textarea('objectives',null, ['class' => 'form-control','rows'=>5]) !!}

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
             {!! Form::select('credit_units', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','N/A'=>'N/A'],null,
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

  <div class="row">
 
     <div class="form-group">
     <div class="col-sm-4">
    
                  
            {!! Form::label('name', 'Course Type') !!}
    </div>
    <div class="col-sm-8">
            {!! Form::select('type',['Mandetory'=>'Mandetory','Elective'=>'Elective'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'select mandetory or elective',
                                      'class'=>'form-control pull-right')) !!}
      </div>
            
   
</div>
    </div>

    <br>
     <div class="row">
    
     <div class="form-group">
     <div class="col-sm-4">
                  
            {!!Form::label('name', 'QUARTERS', ['class' => '']) !!}
     </div>

     <div class="col-sm-8">
             {!! Form::select('semster',['one' => 'FIRST QUARTER', 'two' => 'SECOND QUARTER','three'=>'THIRD QUARTER','four'=>'FOURTH QUARTER'], null,
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'click to select quarter')) !!}
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
             {!! Form::selectYear('year','2017','2025', null, 
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
                        {!! Form::selectYear('year','2017','2025', null, 
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

<div class="row">  


<div class="col-sm-6"> 
<div class="panel-info">
    <div class="panel-heading">DISSEMINATION PLAN</div>
        <div class="panel-body">

{!! Form::open(array('url'=>'dissermination')) !!}
       
            <div class="row">
            <div class="form-group">
                           
                        {!!Form::label('name', 'Dissermination mode:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('mode', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'how u plan to diserminate',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
            
              
            </div>
            <br>

             <div class="row">
            <div class="form-group">
                           
                        {!!Form::label('name', 'Dissermination Date:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::date('date', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'yyyy-mm-dd',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
            
              
            </div>
            <br>



            <div class="row">

                <div class="form-group">

                    {!! Form::label('comment', 'Dissermination comments:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        {!!Form::textarea('comment',null, ['class' => 'form-control','rows'=>5]) !!}

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
                
            {!!Form::close()!!}       </div>

</div>
  
   
            

        </div>

<div class="col-sm-6">
 <div class="panel-warning">
    <div class="panel-heading">VISIT PLAN SETUP</div>
        <div class="panel-body">

        {!! Form::open(array('url'=>'visit_plan')) !!}
       
            <div class="row">
            <div class="form-group">
                           
                        {!!Form::label('name', 'Title:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('title', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'visit title',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
            
              
            </div>
            <br>

             <div class="row">
            <div class="form-group">
                           
                        {!!Form::label('name', 'Institution Name:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('institution', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'name of institution',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
            
              
            </div>
            <br>
            
            <h4>Visit Dates</h4>
             <div class="row">
             <div class="col-sm-6">
                <div class="form-group">
                           
                        {!!Form::label('name', 'From:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-10">
                      
                         {!! Form::date('date_from', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>
             </div>
             <div class="col-sm-6">
                <div class="form-group">
                           
                        {!!Form::label('date', 'To:', ['class' => 'control-label col-sm-2'])!!}
                        
                        <div class="col-sm-10">
                
                         {!! Form::date('date_to', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>
             </div>
             
            
              
            </div>
             <br>

               <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save Visit', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
                <br>
                <br>
                
            {!!Form::close()!!}

        </div>
  </div>
    


</div>

    </div>                                                   
                                                          
                                                          
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>


              
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

                                                                  {!! Form::label('comments', 'COMMENTS:', ['class' => 'col-md-4 control-label']) !!}
                                                                  <div class="col-md-8">
                                                                      {!!Form::textarea('comments',null, ['class' => 'form-control','rows'=>5]) !!}

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
   
  <div class="panel panel-success">
    <div class="panel-heading"> <h3>Supervised Students</h3></div>
    <div class="panel-body">
 {!! Form::open(array('url'=>'supervised_students')) !!}



         <div class="row">
         <div class="col-sm-6">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'First Name:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('fname', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'First Name',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div> 

          </div> 
                 
           <div class="col-sm-6">     

                   
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Last Name:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('lname', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'last name',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
              </div>
           </div>        
                  <br>



                   <div class="row">
                         <div class="form-group">
                           
                        {!!Form::label('name', 'Course:', ['class' => 'control-label col-sm-4'])!!}
                        
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
                           
                        {!!Form::label('name', 'Institution:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::text('institution', null, 
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
                           
                        {!!Form::label('name', 'Level:', ['class' => 'control-label col-sm-4'])!!}
                        
                        <div class="col-sm-8">
                      
                         {!! Form::select('level',['MASTERS' => 'MASTERS', 'UNDERGRADUATE' => 'UNDERGRADUATE'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Click to select',
                                       'class'=>'form-control pull-right')) !!}
                          </div>
                        </div>  
                  </div>
                  <br>



             
           <div class="form-group">
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              
            </div>
                
        {!!Form::close()!!}

        </div>  
            

  </div>
  </div>
  <div id="menu12" class="tab-pane fade">
    
<div class="panel panel-success">

<div class="panel-heading"><h3>Schools Visited</h3> </div>

<div class="panel-body">
{!! Form::open(array('url'=>'schools_visit')) !!}

            
  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('School', 'School Name:') }}
                </div>

             <div class="col-sm-8">
                      
                         {!! Form::text('school', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'School that has been visited',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>

  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('name', 'District/Region:') }}
                </div>

             <div class="col-sm-8">
                      
                         {!! Form::text('dist', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Region / District where school is',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>

    <div class="row">

        <div class="form-group">

            {!! Form::label('comment', 'COMMENTS:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!!Form::textarea('comment',null, ['class' => 'form-control','rows'=>5]) !!}

            </div>
        </div>
    </div>

    <br>

           <div class="row">   
           <div class="form-group">
           <div class="col-sm-10"></div>
               <div class="col-sm-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
               </div> 
                
             {!!Form::close()!!} 
</div>
  </div>

  </div>
  <div id="menu23" class="tab-pane fade">
  

 <div class="panel panel-success"> 
              <div class="panel-heading"><h3>Research Projects</h3></div>
             <div class="panel-body">        
            
            {!! Form::open(array('url'=>'research_prog')) !!}

<div class="row">


            <div class="form-group">
          <div class="col-sm-4">        
          {!! Form::label('name', 'Project Name:') !!}
         </div>
         <div class="col-sm-8">
            {!! Form::text('prog_name', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Name',
                                       'class'=>'form-control pull-right')) !!}

         </div>   
            </div>
</div>
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br>
      <div class="row">


            <div class="form-group">
          <div class="col-sm-4">        
          {!! Form::label('name', 'Personal Role:') !!}
         </div>
         <div class="col-sm-8">
            {!! Form::text('role', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Role you played on project',
                                       'class'=>'form-control pull-right')) !!}

         </div>   
            </div>
</div>
                  
<br>

<div class="row">


<div class="form-group">
  <div class="col-sm-4">        
          {!! Form::label('name', 'Implementation Institution:') !!}
  </div>

    <div class="col-sm-8">
            {!! Form::text('institute', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Institution where project implemented',
                                       'class'=>'form-control pull-right')) !!}

         </div>   
</div>

</div>
<br>
<div class="row">


  <div class="form-group">

      <div class="col-sm-4">        
          {!! Form::label('name', 'Comments:') !!}
         </div>
         <div class="col-sm-8">
            {!! Form::textarea('comment', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'any comments',
                                       'class'=>'form-control pull-right')) !!}

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

            
               
                
            {!!Form::close()!!}                                       

            </div>
                   
              </div>          
      
          
    
  

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
<div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">CONFRENCES AND WORKSHOPS </h4>
              </div>
                <div class="modal-body" style="text-align: center;">
                                                          
                  <div class="panel panel-success">

<div class="panel-heading"><h3>Confrences / workshops attended</h3> </div>

<div class="panel-body">
{!! Form::open(array('url'=>'confrence')) !!}

            
  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">

            {{ Form::label('name', 'Confrences / Workshops:') }}
                </div>

             <div class="col-sm-8">
                      
                         {!! Form::text('conference_name', null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Confrence / workshop name',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>

  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('name', 'Personal role:') }}
                </div>

             <div class="col-sm-8">
                      
                         {!! Form::text('role', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Role played ',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>
  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('name', 'Venue:') }}
                </div>

             <div class="col-sm-8"> 
                      
                         {!! Form::text('venue', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Venue for the confrence',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>

  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('name', 'Date:') }}
                </div>

             <div class="col-sm-8"> 
                      
                         {!! Form::date('date', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'yyyy-mm-dd',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>

  <div class="row">
            <div class="form-group">
             <div class="col-sm-4">     
            {{ Form::label('name', 'Comments:') }}
                </div>

             <div class="col-sm-8"> 
                      
                         {!! Form::textarea('comment', null, 
                              array( 
                                      'class'=>'form-control', 
                                       'placeholder'=>'comments go here',
                                       'class'=>'form-control pull-right')) !!}
            </div>
            </div>
</div>
<br>
           <div class="row">   
           <div class="form-group">
           <div class="col-sm-10"></div>
               <div class="col-sm-2"> 
              {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
               </div> 
                
             {!!Form::close()!!} 

             </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        
                                                      </div>
</div>
  </div>
                                                          
                                                      
                                                    </div>
                                                  </div>
                                                </div>

    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal6">Exciting Moments</a></ul>
                                    
                                    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Exciting moments</h4>
                                                      </div>
                                                      <div class="modal-body" style="text-align: center;">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">OTHER PUBLICATIONS</a></li>
  <li><a data-toggle="tab" href="#menu1">AWARDS AND PRIZES</a></li>
  
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    
    <div class="panel panel-default">

  <div class="panel-heading">PUBICATIONS WRITTEN</div>

  <div class="panel-body">
    
  {!! Form::open(array('url'=>'save_publication')) !!}
    <div class="row">                       
      <div class="form-group">
      <div class="col-sm-4">
         {!! Form::label('name', 'Manuscript title:', ['class' => ' ']) !!} 
        </div>
        <div class="col-sm-8">
            {!! Form::input('title', 'title', null, ['class' => 'form-control']) !!}
            <!--col-md-6-->

            </div>
           </div>
  </div>
<br>

  
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br> 
           
            <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Authors:', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-8">
             {!!Form::textarea('citation',null,
                        array(
                         'class' => 'form-control',
                         'rows'=>2,
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

             <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Journal', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-8">
             {!!Form::text('journal',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

             <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Volume', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!!Form::number('volume',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

             <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Date of publication', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!!Form::date('date',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

            <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Issue', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!!Form::text('issue',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

            <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Number of pages', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!!Form::number('pages',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

            <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Status', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!! Form::select('status',['Not complete' => 'Not complete', 'Submitted' => 'Submitted','Accepted'=>'Accepted','Published'=>'Published'], null, 
                              array('required', 
                                      'class'=>'form-control', 
                                       'placeholder'=>'Click to select status',
                                       'class'=>'form-control pull-right')) !!}
            </div>
           </div>
    </div>
            
            <br>
              
              
  
               <div class="form-group">
               <div class="col-md-3 offset-md-2"> 
              {!! Form::submit('Save Publication', ['class' => 'btn btn-success']) !!}
              </div>
                </div>
                <br>
                <br>

               
                
            {!!Form::close()!!} 


  </div>
  
</div>

  </div>
  <div id="menu1" class="tab-pane fade">
    <div class="panel panel-default">
      <div class="panel-heading">PRIZES / AWARDS</div>

        <div class="panel-body">
        
        {!! Form::open(array('url'=>'moments')) !!}
    <div class="row">                       
      <div class="form-group">
      <div class="col-sm-4">
         {!! Form::label('name', 'Award Name:', ['class' => ' ']) !!} 
        </div>
        <div class="col-sm-8">
            {!! Form::input('name', 'name', null, ['class' => 'form-control']) !!}
            <!--col-md-6-->

            </div>
           </div>
  </div>
<br>

             <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Date of Award', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-4">
             {!!Form::date('date',null,
                        array(
                         'class' => 'form-control',
                         )) !!}
            </div>
           </div>
    </div>
            
            <br>

  
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
            <br> 
           
            <div class="row">                       
      <div class="form-group">
      
          {!! Form::label('name', 'Comments:', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-8">
             {!!Form::textarea('comment',null,
                        array(
                         'class' => 'form-control',
                         'rows'=>2,
                         )) !!}
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

               
                
            {!!Form::close()!!} 


        </div>


    </div>
  </div>
  
</div>                      
  </div>  




             
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                    
                                    <ul><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal5">Individual Development Planning Action Plan</a></ul>
                                    
                                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                      <div class="modal-body">
                                                          
                                                      <div class="panel">
                                                        <div class="panel-heading">Individual Development Planning Action Plan</div>
                                                        <div class="panel-body">
                                                          
                            {!! Form::open(array('url'=>'development')) !!}

                            <h4>Period of plan </h4>
                            <div class="row">

                            <div class="col-xs-6">
                                                <div class="form-group">
                                                 <div class="col-sm-2">

                                                {{ Form::label('name', 'From:') }}
                                                    </div>

                                                 <div class="col-sm-10">
                                                          
                                                {!! Form::date('from', null, 
                                                      array('required', 
                                                              'class'=>'form-control', 
                                                               'placeholder'=>'',
                                                               'class'=>'form-control pull-right')) !!}
                                    </div>
                                    </div>
                        </div>
                        


                        <div class="col-xs-6">
                          <div class="form-group">
                                                 <div class="col-sm-2">

                                                {{ Form::label('name', 'To:') }}
                                                    </div>

                                                 <div class="col-sm-10">
                                                          
                                                {!! Form::date('to', null, 
                                                      array('required', 
                                                              'class'=>'form-control', 
                                                               'placeholder'=>'',
                                                               'class'=>'form-control pull-right')) !!}
                                    </div>
                                    </div>



                        </div>
                        </div>
                        <br>
                        <br>

<h4>IDP  Aim(s):</h4>


                        <div class="row">
                                                <div class="form-group">
                                                 <div class="col-sm-4">

                                                {{ Form::label('name', 'Individual development goals:') }}
                                                    </div>

                                                 <div class="col-sm-8">
                                                          
                                                {!! Form::text('goal', null, 
                                                      array('required', 
                                                              'class'=>'form-control', 
                                                               'placeholder'=>'Your goal title',
                                                               'class'=>'form-control pull-right')) !!}
                                    </div>
                                    </div>
                        </div>
                        <br>

                                                            <div class="row">

                                                                <div class="form-group">

                                                                    {!! Form::label('objective', 'Individual development SMART objectives:', ['class' => 'col-md-4 control-label']) !!}
                                                                    <div class="col-md-8">
                                                                        {!!Form::textarea('objective',null, ['class' => 'form-control','placeholder'=>'Your skills or abilities','rows'=>5]) !!}

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>




                                                            <div class="row">

                                                                <div class="form-group">

                                                                    {!! Form::label('target', 'Individual Development Activities :', ['class' => 'col-md-4 control-label']) !!}
                                                                    <div class="col-md-8">
                                                                        {!!Form::textarea('target',null, ['class' => 'form-control','rows'=>5]) !!}

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>




                                               

                                                    <div class="row">
                                                <div class="form-group">
                                                 <div class="col-sm-4">

                                                {{ Form::label('name', 'Target Date:') }}
                                                    </div>

                                                 <div class="col-sm-8">
                                                          
                                                {!! Form::date('time_frame', null, 
                                                      array('required', 
                                                              'class'=>'form-control', 
                                                               'placeholder'=>'time frame within which skill is developed',
                                                              
                                                               'class'=>'form-control pull-right')) !!}
                                    </div>
                                    </div>
                        </div>
                                                            <br>

                                                            <div class="row">

                                                                <div class="form-group">

                                                                    {!! Form::label('evidence', 'Evidence of achievement (of goals and objectives):', ['class' => 'col-md-4 control-label']) !!}
                                                                    <div class="col-md-8">
                                                                        {!!Form::textarea('evidence',null, ['class' => 'form-control','rows'=>5]) !!}

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>





                        <div class="row">
                                                <div class="form-group">
                                                 <div class="col-sm-4">

                                                {{ Form::label('name', 'Date achieved:') }}
                                                    </div>

                                                 <div class="col-sm-8">
                                                          
                                                {!! Form::date('achieve', null, 
                                                      array('required', 
                                                              'class'=>'form-control', 
                                                               'placeholder'=>'opportunities for development',
                                                              
                                                               'class'=>'form-control pull-right')) !!}
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

               
                
            {!!Form::close()!!} 


                  </div>



                                                      </div>    
                                                      
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                       
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
                                       

                                        <div class="panel-body">
                                            <div class="row text-center">


      <div class="col-sm-4" >
        <div class="thumbnail" style="background-color: #ECE9D8">
          <span> <i class="fa fa-book fa-5x" aria-hidden="true"></i></span>
          <p><strong>Study registered</strong></p>
         

         <a class="btn btn-success" href="showstudy"> Show me </a>
          
        </div>
      </div>
      <div class="col-sm-4 ">
        <div class="thumbnail"  style="background-color: #ECE9D8">
        <span> <i class="fa fa-group fa-5x" aria-hidden="true"></i></span>
          <p><strong>Public Engagement</strong></p>
          
          <a class="btn btn-success" href="showengage"> Show me </a>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail" style="background-color: #ECE9D8">
           <span> <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i></span>
          <p><strong>Courses registered</strong></p>

          <a class="btn btn-success" href="showcourse"> Show me </a>
        </div>
      </div>
      </div>

      <div class="row text-center">
 <div class="col-sm-4">
        <div class="thumbnail" style="background-color: #ECE9D8">
          <span> <i class="fa fa-users fa-5x" aria-hidden="true"></i></span>
          <p><strong>Meetings scheduled</strong></p>
          
          <a class="btn btn-success" href="showmeet"> Show me </a>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="thumbnail" style="background-color: #ECE9D8">
           <span> <i class="fa fa-list fa-5x" aria-hidden="true"></i></span>
          <p><strong>Research Manuscripts</strong></p>
          
          <a href="showpublish" class="btn btn-success">Show me</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail" style="background-color: #ECE9D8">
           <span> <i class="fa fa-users fa-5x" aria-hidden="true"></i></span>
          <p><strong>Supervised students</strong></p>
          <a href="showsupervised" class="btn btn-success"> Show me</a> 
        </div>
      </div>
      </div>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                        </div><!--col-md-8-->
  <div class="modal-footer">
                                                    

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection