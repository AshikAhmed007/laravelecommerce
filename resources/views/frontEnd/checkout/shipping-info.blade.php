@extends('frontend.base')

@section('title')
Smart Shop | Shipping
@endsection

@section('content')
<div class="container">
	<div style="margin-top: 30px;" class="text-center">
	<h4 class="text-success text-center">Hello <b>{{$customerById->firstName.' '.$customerById->lastName}}</b>, You have to give product shipping information to complete your valuable order. If your product billing information & shipping information are same then just press on save shipping info button</h4>
	</div>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
        
        	<div class="panel panel-default" style="margin-top: 60px">

        		<div class="panel-heading">
			    		<h3 class="panel-title">Shipping From</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="/checkout/save-shipping" method="POST"  >
			    			@csrf
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6 ">
			    					<div class="form-group">
			                <input type="text" name="firstName" id="firstName" class="form-control " value="{{$customerById->firstName}}" >
			               
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="lastName" id="lastName" class="form-control " value="{{$customerById->lastName}}" >
			    						
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control " value="{{$customerById->email}}">
			    				
			    			</div>

			    			
			    			<div class="form-group">
			    				<input  name="phone" type="number" id="phone" class="form-control " value="{{$customerById->phone}}">
			    				
			    			</div>
			    			<div class="form-group">
			    				<textarea  name="address" id="address" class="form-control " >{{$customerById->address}}</textarea>
			    				
			    			</div>
			    			<input type="submit" value="Save Shipping Info" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@endsection