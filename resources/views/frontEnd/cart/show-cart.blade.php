@extends('frontend.base')

@section('title')
Smart Shop | Product Details
@endsection

@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Checkout</h3>
	</div>
</div>
<div class="container">
	<div class="row">

		<div class="col-lg-12"><br>
			<h3 class="text-center text-success">My Shopping Cart</h3>
		</div>
		<div class="col-lg-12"><br>
	<table class="timetable_sub">
		
		<thead>
			<th>SL.</th>
			<th>Product Id</th>
			<th>Product Image</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product Quantity</th>
			<th>Total Price</th>
			<th>Action</th>
		</thead>
		@php($i=1)
		@php($sum=0)
		@php($qty=0)
		@forelse($carts as $cart)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$cart->id}}</td>
			<td><img src="{{asset('/admin/')}}/images/{{'pic-'.$cart->id.'.'.$cart->options->image}}" width="50px" height="50px"></th>
			<td>{{$cart->name}}</td>
			<td>TK. {{$cart->price}}</td>
			<td>
				<form action="/update-cart-product" method="POST">
					@csrf
					<div class="col-xs-4">
					<input type="number" value="{{$cart->qty}}" name="qty" min="1" class="form-control ">
					</div>
					<input type="hidden" value="{{$cart->rowId}}" name="rowId">
					<div class="col-xs-2">
					<button type="submit" name="btn" class="btn btn-success" title="Update-cart-product"><span class="glyphicon glyphicon-ok"></span></button>
				</div>
				</form>
			</td>
			<td>TK. {{$total=$cart->price*$cart->qty}}</td>
			<td>
				<a href="/delete-cart-product/{{$cart->rowId}}" class="btn btn-danger" title='Delete Cart Product' onclick="return confirm('Are you sure to delete this?');"><span class=" glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
		@php($sum=$sum+$total)
		@php($qty=$qty+$cart->qty)
		@empty
		<h1>No Product Available</h1>
		@endforelse
	</table>
	<div class="checkout-left">	
				
				
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Sub Total <i>-</i> <span>TK. {{$sum}}</span></li>
						<li>Discount <i>-</i> <span>TK. {{$discount=0}}</span></li>
						<li>Tax <i>-</i> <span>TK. {{$tax=0}}</span></li>
						<li>Grand Total <i>-</i> <span>TK. {{$gtotal=($sum-$discount)+$tax}}</span></li>
						<?php 
						Session::put('orderTotal',$gtotal);
						Session::put('qty',$qty);
						 ?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	
	<div>
		<ul class="pager">
		<li class="previous"><a href="/" >Continue Shopping</a></li>
		<?php 
		$customerId=Session::get('customerId');
		$shippingId=Session::get('shippingId');
		if($customerId!=null && $shippingId!=null){?>

		<li class="next"><a href="/checkout/payment" >Checkout</a></li>

	<?php }else if($customerId!=null){?>

		<li class="next"><a href="/checkout/shipping" >Checkout</a></li>
	<?php }else{?>

		<li class="next"><a href="/checkout" >Checkout</a></li>
	<?php } ?>
		</ul>
	</div>
</div>
</div>
</div>

@endsection

<!-- <table class="table table-bordered">
		<tr>
			<th>Sub Total</th>
			<td>TK. {{$sum}}</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>TK. {{$discount=0}}</td>
		</tr>
		<tr>
			<th>Tax</th>
			<td>TK. {{$tax=0}}</td>
		</tr>
		<tr>
			<th>Grand Total</th>
			<td>TK. {{$gtotal=($sum-$discount)+$tax}}</td>
		</tr>
	</table> -->