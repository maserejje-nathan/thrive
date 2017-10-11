<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="{{URL::to('/admin/dash')}}">Thrive Online Supervision and Mentorship</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{URL::to('/admin/dash')}}"><i class="fa fa-dashboard"> Dashboard </i></a></li>
        <li class="tab col s3"><a href="{{url('messages')}}"> <i class="fa fa-envelope"> Messages </i> @include('messenger.unread-count')</a></li>
        <li><a href="{{URL::to('/admin/dash-profile')}}"><i class="fa fa-user"></i> Profile <i></i></a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>

