@extends('admin.master')

@section('content')

<div class="container-fluid" style="margin-top: 50px;">
	
	<h3 class="text-center">Product Information</h3><br><br>
	
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
	<h3 class="text-center text-danger">{{Session::get('msg')}}</h3>
<table class="table table-dark table-hover text-center">                                                                                                                    
	<thead>
		
		<td>Product Name</td>
		<td>Category Name</td>
		<td>Manufacture Name</td>
		<td>Product Price</td>
		<td>Product Quantity</td>
		<td>Product Image</td>
		<td>Publication Status</td>
		<td>Action</td>
	</thead>
	
	@foreach($products as $product)
	<tr>
		<td>{{$product->productName}}</td>
		<td>{{$product->category->categoryName}}</td>
		<td>{{$product->manufacturer->manufacturerName}}</td>
		<td>TK {{$product->productPrice}}</td>
		<td>{{$product->productQuantity}}</td>
		<td><img src="/admin/images/{{'pic-'.$product->id.'.'.$product->productImage}}" width="50px" height="50px"></td>
		<td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
		<td>
			<a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="Product View"><span class="fas fa-fw fa-eye"></span></a>
			<a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit"><span class="fas fa-fw fa-edit"></span></a>
			<a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" title="Product Delete" onclick="return confirm('Are you sure to delete this?');"><span class="fas fa-fw fa-trash"></span></a>
		</td>
		
	</tr> 
	@endforeach
	
</table>
</div>
@endsection