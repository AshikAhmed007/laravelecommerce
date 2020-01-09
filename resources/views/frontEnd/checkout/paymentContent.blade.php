@extends('frontend.base')

@section('title')
Smart Shop | Payment Details
@endsection

@section('content')
<div class="container">
	<div style="margin-top: 30px;" class="text-center">
	<h4 class="text-success text-center"> You have to give us product payment information to complete your valuable order.</h4>
	</div>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
        
        	<div class="panel panel-default" style="margin-top: 60px">

        		<div class="panel-heading">
			    		<h3 class="panel-title">Payment From</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="/checkout/save-order" method="POST"  >
			    			@csrf	
			    	
			    			<div class="">
			    				<label><input type="radio" name="paymentType" value="cashOnDelivery" > Cash On Delivery</label>
			    			</div>
			    			<div class="">
			    				<label><input type="radio" name="paymentType" value="bkash" > Bkash</label>
			    			</div>
			    			<div class="">
			    				<label><input type="radio" name="paymentType" value="paypal" > Paypal</label>
			    			</div>


			    			
			    			<input type="submit" value="Save Shipping Info" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@endsection