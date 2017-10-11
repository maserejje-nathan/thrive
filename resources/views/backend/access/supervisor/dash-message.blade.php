@extends ('backend.layouts.app2')
<br>
@section('content')

<div class="panel panel-default">

<div class="panel-heading">Messages</div>
	
<div class="panel-body">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">NEW MESSAGE <i class="fa fa-envelope"></i> </a></li>
  <li><a data-toggle="tab" href="#menu1">INBOX <i class="fa fa-inbox"></i> @include('messenger.unread-count')</a></li>
  <li><a data-toggle="tab" href="#menu2">SENT MESSAGES <i class="fa fa-send"></i> </a></li>
  <li><a data-toggle="tab" href="#menu3">TRASH <i class="fa fa-trash"></i></a></li>
</ul>

<div class="tab-content">
<!--new message.-->
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>

  <!-- messages are handled hear-->

  <div id="menu1" class="tab-pane fade">
   <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Collapsible Group 1</a>
      </h4>
    </div>
    @include('messenger.index')
  </div> 
</div>
  </div>



<!-- sent messages-->
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div> 



<!--trash-->

   <div id="menu3" class="tab-pane fade">
    <h3>Menu 3</h3>
    <p>Some content in menu 3.</p>
  </div>
</div>
  
</div>

</div>



@endsection 