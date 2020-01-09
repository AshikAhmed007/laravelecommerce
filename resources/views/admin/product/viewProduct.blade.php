@extends('admin.master')

@section('content')
<div class="container"> <br><br>
	<table class="table table-bordered ">
		<tr>
			<th>Product Id</th>
			<th>{{$productById->id}}</th>
		</tr>
		<tr>
			<th>Product Name</th>
			<th>{{$productById->productName}}</th>
		</tr>
		<tr>
			<th>Category Name</th>
			<th>{{$productById->category->categoryName}}</th>
		</tr>
		<tr>
			<th>Manufacturer Name</th>
			<th>{{$productById->manufacturer->manufacturerName}}</th>
		</tr>
		<tr>
			<th>Product Price</th>
			<th>TK {{$productById->productPrice}}</th>
		</tr>
		<tr>
			<th>Product Quantity</th>
			<th>{{$productById->productQuantity}}</th>
		</tr>
		<tr>
			<th>Product Short Description</th>
			<th>{!!$productById->productShortDescription!!}</th>
		</tr>
		<tr>
			<th>Product Long Description</th>
			<th>{!!$productById->productLongDescription!!}</th>
		</tr>
		<tr>
			<th>Product Image</th>
			<th><img src="{{asset('/admin/')}}/images/{{'pic-'.$productById->id.'.'.$productById->productImage}}" width="200px" height="200px"></th>
		</tr>
		<tr>
			<th>Publication Status</th>
			<th>{{$productById->status == 1 ? 'Published' : 'Unpublished'}}</th>
		</tr>
		
		
	</table>
	</div>
@endsection