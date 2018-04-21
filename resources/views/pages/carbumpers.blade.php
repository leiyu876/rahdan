@extends('layouts.app')


@section('content')		
	<div class="content">
		<div class="products-box">
			<div class="products">
				<h5><span>Car </span>bumpers</h5>
				<div class="car-tires-top-pagnation">
					<ul>
						<li><a href="index.html">Home /</a></li>
						<li><span>Car bummpers</span></li>
					</ul>
				</div>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b1.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$512.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
				   </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b2.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						<h4>$300.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/b3.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$120.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b4.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$500.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b1.jpg') }}">
						 <h3>Lorem Ipsum is simply</h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4>$120.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
				</div>
			</div>
			<div class="products products-secondbox">
				<h5><span>Our</span> Specials</h5>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b6.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$600.00</span>$512.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
				   </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b7.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$400.00</span>$352.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/b8.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						  <h4><span>$300.00</span>$202.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b4.jpg') }}">
						 <h3>Lorem Ipsum is simply </h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$400.00</span>$322.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/b1.jpg') }}">
						 <h3>Lorem Ipsum is simply</h3>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, in reprehenderit.</p>
						 <h4><span>$700.00</span>$602.00</h4>
					     <div class="button"><span><a href="singlepage.html">Read More</a></span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection