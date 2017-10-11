@extends('frontend.layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Search Results for <em> <b>{{$q}}</b> </em>..........</div>
        <div class="panel-body">

            <table class="table table-responsive table-bordered">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Add supervisor</th>

                </thead>
                <tr>
                    <?php $i = 1 ?>
                    @foreach($user as $supervisors)
                        <td>{{$i++}}</td>
                        <td>{{$supervisors->name}}</td>
                        <td>{{$supervisors->email}}</td>



                        <td><p data-placement="top" data-toggle="tooltip" title="Add supervisor">
                                <a href="{{url('supervise')}}/{{$supervisors->id}}"><button type="button" class="btn btn-success btn-xs">
                                        ADD <span class="glyphicon glyphicon-plus"></span></button></a>

                        </td>


                </tr>
                @endforeach


            </table>


        </div>
    </div>

@endsection