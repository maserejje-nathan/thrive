
<a href="/print/{{$logged_in_user->id}}" class="btn  btn-info col-lg-offset-10 ">Print personal report <i class="fa fa-print"></i></a>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>{{ trans('Date Enrolled') }}</th>
        <td>{{ $logged_in_user->enrol_date}}</td>
    </tr>
    <tr>
        <th>{{ trans('Institution') }}</th>
        <td>{{ $logged_in_user->institution}}</td>
    </tr>
    <tr>
        <th>{{ trans('College') }}</th>
        <td>{{ $logged_in_user->college }}</td>
    </tr>
    <tr>
        <th>{{ trans('School') }}</th>
        <td>{{ $logged_in_user->school }}</td>
    </tr>
    <tr>
        <th>{{ trans('Department') }}</th>
        <td>{{ $logged_in_user->department }}</td>
    </tr>
    <tr>
        <th>{{ trans('Student Number') }}</th>
        <td>{{ $logged_in_user->snumber }}</td>
    </tr>
    <tr>
        <th>{{ trans('Research Topic') }}</th>
        <td>{{ $logged_in_user->topic }}</td>
    </tr>
    <tr>
        <th>{{ trans('Doctoral Program') }}</th>
        <td>{{ $logged_in_user->researchtype }}</td>
    </tr>
     <tr>
        <th>{{ trans('Registration Status') }}</th>

        @if($logged_in_user->regstatus == 0 )

        <td>PARTIALLY REGISTERED</td>

        @else
            <td>FULLY REGISTERED</td>

        @endif   
    </tr>

   
    <tr>
        <th>My Supervisors</th>
        <td>
             <table class="table table-bordered">
                 <tr>
                     <th>#</th>
                     <th>Supervisor Name <i class="fa fa-user-circle-o"></i></th>
                     <th>Email <i class="fa fa-envelope"></i></th>
                     <th>Action <i class="fa fa-cogs"></i></th>
                 </tr>
                 <?php $i = 1 ?>
                 @foreach($mine as $supervisor)
                 <tr>
                     <td>{{$i++}}</td>
                     <td>
                         {{$supervisor->name}} <br>
                     </td>
                     <td>
                         {{$supervisor->email}}
                     </td>
                     <td>
                         <a href="{{url('supervise_delete')}}/{{$supervisor->id}}" class="btn btn-xs btn-danger">Delete <i class="fa fa-trash-o"></i></a>
                     </td>
                 </tr>
                 @endforeach

             </table>



        </td>
    </tr>

     <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>

</table>