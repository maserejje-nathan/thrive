<!DOCTYPE html>
<html>
<head>
    <title>Student report</title>


    <style type="text/css">
        .btn-success{
            background-color: #004d40;
        }
        .btn-warning{
            background-color: #fb8c00;
        }
        table {
            display: table;
            width: 100%;
            page-break-inside: avoid;
        }

        th, td {
            font-family: "Times New Roman", Times, serif;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;

        }
        h4{
            font-family: "Times New Roman", Times, serif;
        }


        th {
            background-color: #4CAF50;
            color: white;
            font-size: 14px
        }
        td{
            font-size: 12px
        }
        .done{
            background-color: green;
        }
        .pend{
            background-color: orange;
        }
        .one{
            width: 100%;
            float: left;
            padding: 15px;
            border: 1px;
        }
        .two{
            width: 100%;
            float: left;
            padding: 15px;
            border: 1px;
        }
        .table {
            display: table;
        }
        .tr {
            display: table-row;
        }
        .highlight {
            background-color: greenyellow;
            display: table-cell;
        }

    </style>
</head>
<body>

@foreach( $user as $usr)
    <u><div><h1 style="text-align: center;"><b>THRIVE CONSORTIUM</b></h1><br></div></u>
    <h3>Online Supervision/ Mentorship tool</h3>
    <p>DETAILED REPORT FOR:  {{$usr->name}} </p>
    <p>ENROLLED DATE: {{ Carbon\Carbon::parse($usr->enrol_date)->format('F jS, Y') }}</p>
    <code>Report generated on: {{Carbon\Carbon::now()->toDateTimeString()}}</code>

    <p><u>University Requirements</u></p>
    <table class="table">
        <tr>
            <th>Registration status</th>
            <th>Institution </th>
            <th>Degree Type </th>
            <th>Topic</th>
            <th>College </th>
            <th>School</th>
            <th> Department</th>


        <tr>


            @if($usr->regstatus == 1)
                <td class="done">COMPLETE</td>
            @else
                <td class="pend">PARTIAL</td>
            @endif

            <td> {{$usr->institution}} </td>
            <td> {{$usr->researchtype}} </td>
            <td> {{$usr->topic}} </td>
            <td> {{$usr->college}} </td>
            <td> {{$usr->school}} </td>
            <td> {{$usr->department}} </td>


        </tr>

@endforeach

    </table>
    <br>

    <p><u>Courses Planned</u></p>

    <table class="table">
        <tr>
            <th>Course Name</th>
            <th>Study Type</th>
            <th>Planned Year of study</th>
            <th>Quarter</th>
            <th>Status</th>
        </tr>
        @foreach($course as $crse)
            <tr>
                <td>{{$crse->course_name}}</td>
                <td>{{$crse->type}}</td>
                <td>{{$crse->year}}</td>
                <td>{{$crse->semster}}</td>
                @if($crse->status == 0)
                    <td class="pend">pending</td>
                @else
                    <td class="done">complete</td>
                @endif

            </tr>
        @endforeach
    </table>
    <br>

    <p><u>Public Engagement</u></p>
    <table class="table">

        <tr>
            <th>Engagement Type</th>
            <th>Audience</th>
            <th>Frequency</th>
            <th>Year</th>
            <th>Comments</th>
        </tr>
        @if(count($engage) ==0 )

            <tr>
                <td>Nothing here </td>
                <td>Nothing here </td>
                <td>Nothing here </td>
                <td>Nothing here </td>
                <td>Nothing here </td>

            </tr>

        @else

            @foreach($engage as $en)
                <tr>
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
                        {!! $en->comments !!}
                    </td>
                </tr>
            @endforeach

        @endif

    </table>
    <br>
    <p><u>Meetings and Status</u></p>
    <table class="table">


        <tr>
            <th>TITLE</th>
            <th>VENUE</th>
            <th>AGENDA</th>
            <th>STATUS</th>
            <th>MINUTES</th>
        </tr>
        @foreach($meet as $met)
            <tr>
                <td>{{$met->title}}</td>
                <td>{{$met->venue}}</td>
                <td>{!! $met->agenda !!}</td>
                @if( $met->status  == 0)
                    <td class="pend"> PENDING</td>
                @else
                    <td class="done"> COMPLETE </td>
                    <td><a href="<?php echo asset("storage/$met->minutes");?>" class="btn btn-info btn-xs">MINUTES DOWNLOAD <i class="fa fa-paperclip"></i></a></td>

                @endif
            </tr>
        @endforeach

    </table>
    <br>

    <p><u>Research Manuscripts</u></p>

    <table class="table table-stripped table-hover table-bordered">

        <tr>

            <th>Title</th>
            <th>Manuscript Authors</th>
            <th>Journal</th>
            <th>Volume</th>
            <th>Issue</th>
            <th>Pages</th>
            <th>Status</th>
        </tr>

        @foreach($publish as $index =>$p)
            <tr>

                <td>{{$p->title}}</td>
                <td>{!! $p->citation !!}</td>
                <td>{{$p->journal}}</td>
                <td>{{$p->volume}}</td>
                <td>{{$p->issue}}</td>
                <td>{{$p->pages}}</td>
                <td>{{$p->status}}</td>
            </tr>

        @endforeach
    </table>
    <br>

    <div class="panel panel-success">

        <div class="panel-heading">Exciting Moments</div>

        <div class="panel-body">

            <table class="table table-striped table-bordered">
                <tr>

                    <th>Name</th>
                    <th>Date</th>
                    <th>Comment</th>
                </tr>
                @foreach($moment as $index=> $mom)
                    <tr>

                        <td>{{$mom->name}}</td>
                        <td>{{$mom->date}}</td>
                        <td>{!! $mom->comment !!} </td>
                    </tr>

                @endforeach

            </table>
        </div>

<br>
    </div>

    <div class="panel panel-success">

        <div class="panel-heading"><h4>Research Leadership </h4> </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">

                    Schools Visited
                    <table class="table table-striped table-bordered">
                        <tr>

                            <th>School Name</th>
                            <th>District / Region</th>
                            <th>Comment</th>
                        </tr>
                        @foreach($school_visit as $visit)
                            <tr>

                                <td>{{$visit->school}}</td>
                                <td>{{$visit->dist}}</td>
                                <td>{!! $visit->comment !!} </td>
                            </tr>

                        @endforeach

                    </table>

                </div>
    <br>

                <div class="col-sm-6">

                    <h4> Research Projects</h4>

                    <table class="table table-striped table-bordered">
                        <tr>

                            <th>Project Name</th>
                            <th>My Role</th>
                            <th>Institution </th>
                            <th>Comments </th>
                        </tr>
                        @foreach($res_projects as $project)
                            <tr>

                                <td>{{$project->prog_name}}</td>
                                <td>{{$project->role}}</td>
                                <td>{{$project->institute}} </td>
                                <td>{!! $project->comment !!}</td>
                            </tr>

                        @endforeach

                    </table>

                </div>

            </div>


<br>
            Supervised Students
            <table class="table table-striped table-bordered">
                <tr>

                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Course </th>
                    <th>Level </th>
                </tr>
                @foreach($supervised as $sup_student)
                    <tr>

                        <td>{{$sup_student->fname}}</td>
                        <td>{{$sup_student->lname}}</td>
                        <td>{{$sup_student->course}} </td>
                        <td>{{$sup_student->level}} </td>
                    </tr>

                @endforeach

            </table>

        </div>


    </div>


<br>
    <div class="panel panel-success">

        <div class="panel-heading">Conferences Attended</div>

        <div class="panel-body">

            <table class="table table-striped table-bordered">
                <tr>

                    <th>Conference Name</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th>Comments</th>
                </tr>
                @foreach($conf as $conference)
                    <tr>

                        <td>{{$conference->conference_name}}</td>
                        <td>{{$conference->role}}</td>
                        <td>{{$conference->date}} </td>
                        <td>{!!$conference->comment!!}</td>
                    </tr>

                @endforeach

            </table>
        </div>


    </div>

<br>
    <div class="panel panel-success">

        <div class="panel-heading">Personal Development plan</div>

        <div class="panel-body">

            <table class="table table-striped table-bordered">
                <tr>

                    <th>From</th>
                    <th>To</th>
                    <th>Individual development goal</th>
                    <th>Individual development objectives</th>
                    <th>Individual Development Activities</th>
                    <th>Target Date</th>
                    <th>Evidence of achievement</th>
                    <th>Date achieved</th>
                </tr>
                @foreach($pdp as $personal)
                    <tr>

                        <td>{{$personal->from}}</td>
                        <td>{{$personal->to}}</td>
                        <td>{{$personal->goal}} </td>
                        <td>{!! $personal->objective !!}</td>
                        <td>{{$personal->target}}</td>
                        <td>{{$personal->time_frame}} </td>
                        <td>{{$personal->evidence}}</td>
                        <td>{{$personal->achieve}} </td>
                    </tr>

                @endforeach

            </table>
        </div>


    </div>
    <br>
    <br>
    <p><u>Studies Registered</u></p>

    <table>
        <tr>
            <th>Study Name</th>
            <th>Ethical Approval</th>
            <th>Status</th>
            <th>Data Collection</th>
            <th>Status</th>
            <th>Data Analysis </th>
            <th>Status</th>
            <th>Manusript writing</th>
            <th>Status</th>
            <th>Papers</th>
        </tr>

        @foreach($study as $s)
            <tr>

                <td>
                    {{$s->study_name}}
                </td>

                <td>{{ Carbon\Carbon::parse($s->ethical_approval)->format('F jS, Y') }}</td>

                @if ( $s->ethics_status == 0)
                    <td class="pend">
                        Pending
                    </td>
                @else
                    <td class="done">
                        COMPLETE
                    </td>
                @endif
                <td>{{ Carbon\Carbon::parse($s->data_collection)->format('F jS, Y') }}</td>

                @if ( $s->collection_status == 0)
                    <td class="pend">
                        Pending
                    </td>
                @else
                    <td class="done">
                        COMPLETE
                    </td>
                @endif
                <td>{{ Carbon\Carbon::parse($s->data_analysis)->format('F jS, Y') }}</td>

                @if ( $s->analysis_status == 0)
                    <td class="pend">
                        Pending
                    </td>
                @else
                    <td class="done">
                        COMPLETE
                    </td>
                @endif
                <td>{{ Carbon\Carbon::parse($s->manuscript)->format('F jS, Y') }}</td>

                @if ( $s->man_status == 0)
                    <td class="pend">
                        Pending
                    </td>
                @else
                    <td class="done">
                        COMPLETE
                    </td>
                @endif

                <td>
                    {{$s->number_papers}}
                </td>
            </tr>
        @endforeach
    </table>


<br>

</body>
</html> 