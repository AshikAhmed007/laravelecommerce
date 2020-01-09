@extends('frontend.base')

@section('title')
Smart Shop | Product Details
@endsection

@section('content')


<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Product Details</h3>
	</div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}" >
							<div > <img src="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}" data-imagezoom="true" class="img-responsive" > </div>
						</li>
						<li data-thumb="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}">
							<div class="thumb-image"> <img src="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}">
							<div class="thumb-image"> <img src="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}">
							<div class="thumb-image" > <img src="{{asset('/admin/')}}/images/{{'pic-'.$product->id.'.'.$product->productImage}}" data-imagezoom="true" class="img-responsive" > </div>
						</li>	
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3>{{$product->productName}}</h3><br>
					<h4> Product Price: <span class="item_price">TK. {{$product->productPrice}}</span></h4>
					<h4> Product Category :<span class="item_price"> {{$product->category->categoryName}}</span></h4>
					<h4> Product Manufacturer: <span class="item_price"> {{$product->manufacturer->manufacturerName}}</span></h4>
					<h4> Product Stock:<span class="item_price">
					@if($product->productQuantity > 0)
						<span class="text-success"><b>{{'Available'}}</b></span>
					@else
						<span class="text-danger"><b>{{'Not Available'}}</b></span>
					@endif

					</span></h4><br>
					
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>  
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
					</div>
					<form action="/add-to-cart" method="POST">
						@csrf
					<div class="color-quality col-lg-8">
						<div class="color-quality-right">
							<div class="col-lg-4">
							<label>Quality :</label>
						</div>
							<div class="col-lg-4">
							<input type="number" name="qty" value="1" min="1" class="form-control" />
						</div>
						</div>
					</div>
					
					<div class="occasion-cart col-lg-8">

						<input type="hidden"  name="productId" value="{{$product->id}}"/>
						<input type="submit" class="item_add hvr-outline-out button2" value='Add to cart'/>
						 
					</div>
					</form>
		</div>
				<div class="clearfix"> </div>

				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(1)</a></li>
							
						</ul>
						<div id="myTabContent" class="tab-content">

							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								
								<p>{!!$product->productLongDescription!!}</span></p>
									
							</div>
							
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="{{asset('frontEnd/images/men3.jpg')}}" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									
									<div class="add-review">
										<h4>add a review</h4>
										<form>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											
											<textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
	</div>
</div>
<!-- //single -->

@endsection
