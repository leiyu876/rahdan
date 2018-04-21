@extends('layouts.app')


@section('content')			
	<div class="content">
		<div class="single-page"><br />
			<div class="single-top-pagination">
				<ul>
					<li><a href="index.html">Home /</a></li>
					<li><span>Productname</span></li>
				</ul>
			</div>
			<div class="clear"> </div>
			<div class="product-info">
				<div class="product-image">
					<div class="flexslider">
				        <!-- FlexSlider -->
							<script src="{{ asset('custom/js/imagezoom.js') }}"></script>
							  <script defer src="{{ asset('custom/js/jquery.flexslider.js') }}"></script>
							<link rel="stylesheet" href="{{ asset('custom/css/flexslider.css') }}" type="text/css" media="screen" />

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
					<li data-thumb="{{ asset('custom/images/triumph_big1.jpg') }}">
						<div class="thumb-image"> <img src="{{ asset('custom/images/triumph_big1.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="{{ asset('custom/images/triumph_thumb1.jpg') }}">
						 <div class="thumb-image"> <img src="{{ asset('custom/images/triumph_thumb1.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="{{ asset('custom/images/triumph_thumb2.jpg') }}">
					   <div class="thumb-image"> <img src="{{ asset('custom/images/triumph_thumb2.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="{{ asset('custom/images/triumph_thumb3.jpg') }}">
					   <div class="thumb-image"> <img src="{{ asset('custom/images/triumph_thumb3.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
					</li>
				  </ul>
				<div class="clear"></div>
			</div>
				</div>
				<div class="product-price-info">
					<div class="product-catrgory-pagenation">
						<ul>
							<li><h3>Categories :</h3></li>
							<li class="active3"><a href="#">Productname</a></li>
							<li><a href="#">Product2</a></li>
							<li><a href="#">Product3</a></li>
						</ul>
					</div>
						<div class="product-value">
						<h4>Product-Complete Details With Value</h4>
						<ul>
							<li><h2>Price :</h2></li>
							<li><span>$350</span></li>
							<li><h5>$500</h5></li>
							<li><a href="#">Instock</a></li>
						</ul>
						<ul>
							<li><h3>Not rated</h3></li>
							<li><h5>No reviews</h5></li>
						</ul>
					</div>
					<div class="product-shipping">
						<span>Shipping :</span>
						<p><lable>FREE</lable> - Flat Rate Courier - Delivery anywhere in </p>
						<div class="clear"> </div>
					</div>
					<div class="product-payments">
						<span>Payments: :</span>
						<p><lable>paypal</lable> - (Credit card, EMI, Debit card, Online Bank Transfer), PaisaPay COD  </p>
						<div class="clear"> </div>
					</div>
					<div class="product-description">
						<h3>Description :</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<a href="#">Addcart</a>
					</div>
					<div class="product-share">
						<h3>share on:</h3>
						<ul>
							<li><a href="#"><img src="{{ asset('custom/images/facebook.png') }}" title="facebook" />Facebook</a></li>
							<li><a href="#"><img src="{{ asset('custom/images/twitter.png') }}" title="Twitter" />Twitter</a></li>
							<li><a href="#"><img src="{{ asset('custom/images/rss.png') }}" title="Rss" />Rss</a></li>
							<li><a href="#"><img src="{{ asset('custom/images/gpluse.png') }}" title="Googlepluse" />Google+</a></li>
						</ul>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</div>
@endsection