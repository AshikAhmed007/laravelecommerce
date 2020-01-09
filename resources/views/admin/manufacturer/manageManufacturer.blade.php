@extends('admin.master')

@section('content')

<div class="container" style="margin-top: 50px;">
	
	<h3 class="text-center">Manufacturer Information</h3><br><br>
	
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
	<h3 class="text-center text-danger">{{Session::get('msg')}}</h3>
<table class="table table-dark table-hover text-center">                                                                                                                    
	<thead>
		
		<td>Manufacturer ID</td>
		<td>Manufacturer Name</td>
		<td>Manufacturer Description</td>
		<td>Publication Status</td>
		<td>Action</td>
	</thead>
	<?php $i=1; ?>
	@foreach( $manufacturer as $manu)
	<tr>
		
		<td>{{$i++}}</td>
		<td>{{$manu->manufacturerName}}</td>
		<td>{{$manu->manufacturerDescription}}</td>
		<td>{{$manu->status == 1 ? 'Published' : 'Unpublished'}}</td>
		<td>
			<a href="{{url('/manufacturer/edit/'.$manu->id)}}" class="btn btn-success"><span class="fas fa-fw fa-edit"></span></a>
			<a href="{{url('/manufacturer/delete/'.$manu->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?');"><span class="fas fa-fw fa-trash"></span></a>
		</td>
		
	</tr> 
	@endforeach
	<?php  $i++; ?>
</table>
</div>
@endsection