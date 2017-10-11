{{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.frontend.name'), ['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
        </div>
    </div>

    <div class="form-group">
        
            {{ Form::label('Institution',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('text', 'institution', null, ['class' => 'form-control','rows'=>'1','style'=>'width:100']) }}
            
        </div>

    </div>

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group">
            {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
            </div>
        </div>
    @endif

    <div class="form-group">
        
            {{ Form::label('College',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('text', 'college', null, ['class' => 'form-control']) }}
            
        </div>

    </div>

     <div class="form-group">
        
            {{ Form::label('School',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('text', 'school', null, ['class' => 'form-control']) }}
            
        </div>

    </div>

     <div class="form-group">
        
            {{ Form::label('Department',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('text', 'department', null, ['class' => 'form-control']) }}
            
        </div>

    
    </div>

     <div class="form-group">
        
            {{ Form::label('Student number',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('number', 'snumber', null, ['class' => 'form-control']) }}
            
        </div>

    </div>


     <div class="form-group">
        
            {{ Form::label('Research Topic',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::input('textarea', 'topic', null, ['class' => 'form-control','rows'=>'3','style'=>'width:100']) }}
            
        </div></div>
          <div class="form-group">
            {{ Form::label('Doctoral Programs',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::select('researchtype', ['Doctorate by Research Only'=>'Doctorate by Research Only','Doctorate by Course work and Dissertation'=>'Doctorate by Course work and Dissertation'], null, ['class' => 'form-control']) }}
            
        </div>
        </div>
        <div class="form-group">
            {{ Form::label('Registration Status',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::select('regstatus', ['0'=>'PARTIAL','1'=>'FULL'], null, ['class' => 'form-control']) }}
            
        </div>
        </div>

        <div class="form-group">
            {{ Form::label('Enrollment Date:',null, ['class' => 'col-md-4 control-label']) }}
            <div class="col-md-4">
                {{ Form::date('enrol_date', null, ['class' => 'form-control']) }}
            
        </div>
        </div>


    

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
        </div>
    </div>

{{ Form::close() }}