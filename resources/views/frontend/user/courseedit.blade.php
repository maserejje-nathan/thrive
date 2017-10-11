@extends('frontend.layouts.app')

@section('content')

    <div class="row">

<div class="col-sm-1">

</div>

        <div class="col-sm-10" >
            <div class="panel panel-default">
                <div class="panel-heading">EDIT Course</div>
                <div class="panel-body">
                    {!! Form::Model($study, [
                   'method' => 'PATCH',
                   'url'=>['updatecourse',$study->id]
                  //'route' => ['updatestudy', $study->id]
                                     ]) !!}

                    <div class="row">

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
                                    {!! Form::select('credit_units', ['1' => '1', '2' => '2','3'=>'3','4'=>'4','5'=>'5','N/A'=>'N/A'],null,
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
                                    {!! Form::select('semster',['FIRST' => 'FIRST QUARTER', 'SECOND' => 'SECOND QUARTER','THIRD'=>'THIRD QUARTER','FOURTH'=>'FOURTH QUARTER'], null,
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

                        <div class="row">

                            <div class="form-group">
                                <div class="col-sm-4">

                                    {!!Form::label('name', 'Status', ['class' => '']) !!}
                                </div>

                                <div class="col-sm-8">
                                    {!! Form::select('status',['0' => 'pending', '1' => 'complete'], null,
                                                     array('required',
                                                             'class'=>'form-control',
                                                              'placeholder'=>'click to select status')) !!}
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="form-group">

                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}

                        </div>
                        <br>

                        {!!Form::close()!!}
                        <br>
                        <br>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-sm-1">

        </div>


    </div>


      @endsection