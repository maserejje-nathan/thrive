 @extends('frontend.layouts.app')

@section('content')


<div class="panel panel-default">
	<div class="panel-heading">Update study status</div>

<div class="panel-body">
	
               {!! Form::Model($meet, [
              'method' => 'PATCH',
              'url'=>['updatestatus_study',$meet->id],
              'files' => true
             //'route' => ['updatestudy', $study->id]
                                ]) !!}
    <div class="row">  
    <div class="col-sm-6">
                     
  		<div class="form-group">
  		<div class="col-sm-4">
         {!! Form::label('name', 'Study Name:', ['class' => ' ']) !!} 
        </div>
        <div class="col-sm-8">
            {!! Form::input('study_name', 'study_name', null, ['class' => 'form-control','readonly' => true]) !!}
            <!--col-md-6-->

            </div>
           </div>
         
</div>

<div class="col-sm-6">
             	
            <div class="form-group">
  		
          {!! Form::label('name', 'Ethical Approval', ['class' => 'col-md-4 control-label']) !!}
         
         @if( $meet->ethics_status == 1)
          	<div class="col-sm-8">
             {!!Form::select('ethics_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->ethics_status,
             						array(
             						 'class' => 'form-control',
             						 'readonly' => true,
                         'disabled' =>'disabled'

             						 )) !!}

                         </div>
          @else
          			<div class="col-sm-8">
             {!!Form::select('ethics_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->ethics_status,
             						array(
             						 'class' => 'form-control',
             						 )) !!}

                 </div>        

          @endif
          
        
            
           </div>

             </div>        
          
	</div>
<br>

	
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />  
                  
     
            
            <br>

             <div class="row">  
            
            <div class="col-sm-6">
           	<div class="form-group">
  		
          {!! Form::label('name', 'Data Collection', ['class' => 'col-md-4 control-label']) !!}

          @if($meet->collection_status == 1)
        
        <div class="col-sm-8">
             {!!Form::select('collection_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->collection_status,
             						array(
             						 'class' => 'form-control',
             						 'readonly'=>true,
                         'disabled'=>'disabled'
             						 )) !!}
            
        </div>  
            @else

            <div class="col-sm-8">
            	 
            	{!!Form::select('collection_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->collection_status,
             						array(
             						 'class' => 'form-control',
             						 
             						 )) !!}
             					 
            </div>
            @endif
		
           </div>

           </div>

           <div class="col-sm-6">
             	
            <div class="form-group">
  		
          {!! Form::label('name', 'Data Analysis', ['class' => 'col-md-4 control-label']) !!}
        
           @if($meet->analysis_status == 1)
        
        <div class="col-sm-8">
             {!!Form::select('analysis_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->analysis_status,
                        array(
                         'class' => 'form-control',
                         'readonly'=>true,
                         'disabled'=>'disabled'
                         )) !!}
            
        </div>  
            @else

            <div class="col-sm-8">
               
              {!!Form::select('analysis_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->analysis_status,
                        array(
                         'class' => 'form-control',
                         
                         )) !!}
                       
            </div>
            @endif
           </div>

             </div>                     
  		
		</div>
            
            <br>
            <br>

             <div class="row">  

 <script type="text/javascript">
    
    $(document).ready(function(){
    $('#choose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $("#public").show();
      }
      else
      {
        $("#public").hide();
      }
    });
});
</script>


  <div class="col-sm-6">
           	<div class="form-group">
  		
          {!! Form::label('name', 'Manuscript Writing', ['class' => 'col-md-4 control-label']) !!}
        
           @if($meet->man_status == 1)
        
        <div class="col-sm-8">
             {!!Form::select('man_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->man_status,
                        array(
                         'class' => 'form-control',
                         'readonly'=>true,
                         'disabled'=>'disabled'
                         )) !!}
            
        </div>  
            @else

            <div class="col-sm-8">
               
              {!!Form::select('man_status',['1' => 'Complete', '0' => 'Not Complete'],$meet->man_status,
                        array(
                         'class' => 'form-control',
                         
                         )) !!}
                       
            </div>
            @endif
           </div>

           </div>
      
      <div class="col-sm-6">
  		<div class="form-group">
  		
          {!! Form::label('name', 'Publications', ['class' => 'col-md-4 control-label']) !!}
        
        <div class="col-sm-8">
             {!!Form::select('pub_status',['0' => 'Pending', '1' => 'Complete'],$meet->pub_status,
             						array(
             						 'id' => 'choose',	
             						 'class' => 'form-control',
             						 'data-toggle'=>'modal',
             						 'data-target'=>'#favoritesModal',

    )) !!}
            </div>
           </div>
           
      
         
           </div>

          
		</div>
            
            <br>
         <input name="pub_type" type="hidden" id="type" value="study_pub" />      
  
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

<div id="public"  style='display:none;'>
	
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




@endsection