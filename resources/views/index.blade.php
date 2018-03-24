@extends('layouts.app')


@section('content')			
	<div class="image-slider">
	    <ul class="rslides" id="slider1">
	      <li><img src="{{ asset('custom/images/slider1.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/slider3.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/slider1.jpg') }}" alt=""></li>
	    </ul>
	</div>
	<?dsdf();?>
	<div class="content">
		<div class="products-box">
			<div class="products">
				<h5><span>FEATURED</span> PRODUCTs</h5>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g3.png') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$512.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				   </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g1.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						<h4>$300.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/g2.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$120.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g3.png') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$500.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g4.jpg') }}">
						 <h3>Lorem Ipsum is simply</h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$120.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
				</div>
			</div>
			<div class="products products-secondbox">
				<h5><span>Our</span> Specials</h5>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g1.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$600.00</span>$512.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				   </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g6.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$400.00</span>$352.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/g7.png') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						  <h4><span>$300.00</span>$202.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g8.png') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$400.00</span>$322.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/g1.jpg') }}">
						 <h3>Lorem Ipsum is simply</h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$700.00</span>$602.00</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
			

