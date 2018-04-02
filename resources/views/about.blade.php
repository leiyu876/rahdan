@extends('layouts.app')


@section('content')			
	<div class="image-slider">
	    <ul class="rslides" id="slider1">
	      <li><img src="{{ asset('custom/images/about_us/1.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/2.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/4.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/5.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/6.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/7.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/8.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/9.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/10.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/about_us/11.jpg') }}" alt=""></li>
	    </ul>
	</div>
	<div class="content">
		<div class="products-box">
			<div class="products">
				<h1><span>ABOUT</span> US</h1>
				<div class="about_text">
					<span>Rahdan Commercial Center</span>
					<p>
					A Sole proprietorship, incorporated as per existing laws of Saudi Arabia. 
					Having main business address in khobar city – Saudi Arabia with physical presence in the market for more than forty years , 
					lead and pioneer auto parts seller and provider , permanently endeavor to keep it is good reputation , 
					excellence of service and fulfill customers expectations.
					</p>
					
					<span>Our Vision :</span> 
					<p>To be a leader in Eastern Province in provision of genuine auto – parts.</p>
					
					<span>Our values : </span>
					<p>
					- Quality of parts 
					- Speed service 
					- Teamwork spirit 
					-Innovation and permanent 
					</p>
					
					<span>Our logo :</span>
					<p>We are happy to serve you</p>
					
				</div>
			</div>
		</div>
	</div>
@endsection
			

