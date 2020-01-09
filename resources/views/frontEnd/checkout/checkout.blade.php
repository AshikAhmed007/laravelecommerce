@extends('frontend.base')

@section('title')
Smart Shop | Checkout
@endsection

@section('content')
<div class="container">
	<div style="margin-top: 30px;" class="text-center">
	<h1 class="text-danger">Welcome to checkout proccess.You have to login first.</h1>
	</div>
        <div class="row centered-form">
        <div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2">
        
        	<div class="panel panel-default" style="margin-top: 60px">

        		<div class="panel-heading">
			    		<h3 class="panel-title">Registration From Here</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="/checkout/sign-up" method="POST"  >
			    			@csrf
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6 ">
			    					<div class="form-group">
			                <input type="text" name="firstName" id="firstName" class="form-control " placeholder="First Name*">
			                @error('firstName')
     						 <p class="text-danger">{{$errors->first('firstName')}}</p>
      						@enderror
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="lastName" id="lastName" class="form-control " placeholder="Last Name*">
			    						@error('lastName')
     						 <p class="text-danger">{{$errors->first('lastName')}}</p>
      						@enderror
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control " placeholder="Email Address*">
			    				@error('email')
     						 <p class="text-danger">{{$errors->first('email')}}</p>
      						@enderror
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control " placeholder="Password*">
			    						@error('password')
     						 <p class="text-danger">{{$errors->first('password')}}</p>
      						@enderror
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password*">
			    						@error('password_confirmation')
     						 <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
      						@enderror
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<input  name="phone" type="number" id="phone" class="form-control " placeholder="Phone Number*">
			    				@error('phone')
     						 <p class="text-danger">{{$errors->first('phone')}}</p>
      						@enderror
			    			</div>
			    			<div class="form-group">
			    				<textarea  name="address" id="address" class="form-control " placeholder="Address*"></textarea>
			    				@error('address')
     						 <p class="text-danger">{{$errors->first('address')}}</p>
      						@enderror
			    			</div>
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>


    		<div class="col-xs-6 col-sm-6 col-md-4 ">
        	<div class="panel panel-default" style="margin-top: 60px">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Log From Here  </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="/customer/login">
			    			@csrf
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control " placeholder="Email Address*">
			    			</div>
			    			<div class="form-group">
			    				<input type="password" name="password" id="email" class="form-control " placeholder="Password*">
			    			</div>
			    			
			    			<input type="submit" value="Login " class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
@endsection