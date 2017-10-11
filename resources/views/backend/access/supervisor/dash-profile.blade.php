@extends ('backend.layouts.app2')
<br>
@section('content')

<div class="panel panel-default">
<div class="panel-heading">Profile</div>
<div class="panel-body">
<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
   

</table>
</div>
</div>

@endsection