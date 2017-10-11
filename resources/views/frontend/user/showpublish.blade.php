 @extends('frontend.layouts.app')

@section('content')

<div class="panel panel-default">

<div class="panel-heading">Papers that have been wrtitten</div>
<div class="panel-body">

<table class="table table-stripped table-hover table-bordered">

<tr>
	<th>#</th>
	<th>Title</th>
	<th>Manuscript Authors</th>
	<th>Journal</th>
	<th>Volume</th>
	<th>Issue</th>
	<th>Pages</th>
	<th>Status</th>
</tr>
    <?php $i = 1 ?>
@foreach($publish as $index =>$p) 
<tr>
<td>{{ $i++ }}</td>
<td>{{$p->title}}</td>	
<td>{!! $p->citation!!}</td>
<td>{{$p->journal}}</td>
<td>{{$p->volume}}</td>
<td>{{$p->issue}}</td>
<td>{{$p->pages}}</td>
<td>{{$p->status}}</td>
</tr>
	
@endforeach
</table>
	
</div>
	
</div>




@endsection