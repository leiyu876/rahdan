@extends('layouts.app')


@section('content')			
	<div class="image-slider">
	    <ul class="rslides" id="slider1">
	      <li><img src="{{ asset('custom/images/toyota/camry.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/prado.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/corolla.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/fortuner.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/hilux.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/innova.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/land_cruiser.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/land_cruiser_pickup.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/previa.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/rav4.jpg') }}" alt=""></li>
	      <li><img src="{{ asset('custom/images/toyota/zelas.jpg') }}" alt=""></li>
	    </ul>
	</div>
	<div class="content">
		<div class="products-box">
			<div class="products products-secondbox">
				<h5><span>FEATURED</span> PRODUCTs</h5>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/04152-38010 ELEMENT, OIL 66 33.jpg') }}" style="width:210px; height: 204px;">
						 <h3>ELEMENT, OIL FILTER</h3>
						 <p>04152-38010</p>
						 <h4><span>66.00</span>33.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				   </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/52119-5E916 COVER, FR BUMPER 937 674.jpg') }}" style="width:210px; height: 204px;">
						 <h3>COVER, FR BUMPER</h3>
						<p>52119-5E916</p>
						<h4><span>937.00</span>674.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/car parts/53112-53061 GRILLE, RADIATOR 786 564.jpg') }}" style="width:210px; height: 204px;">
						 <h3>GRILLE, RADIATOR</h3>
						 <p>53112-53061</p>
						 <h4><span>786.00</span>564.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/car parts/04465-YZZR4 MVP BRAKE PAD 354 177.jpeg') }}" style="width:210px; height: 204px;">
						 <h3>MVP BRAKE PAD</h3>
						 <p>04465-YZZR4</p>
						 <h4><span>354.00</span>177.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
					<div class="grid_1_of_5 images_1_of_5">
						<img src="{{ asset('custom/images/car parts/90919-01235 PLUG, SPARK K20HR-U11 19 14.jpg') }}" style="width:210px; height: 204px;">
						 <h3>PLUG, SPARK K20HR-U11</h3>
						 <p>90919-01235</p>
						 <h4><span>19.00</span>14.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
					</div>
				</div>
			</div>
			<div class="products products-secondbox">
				<h5><span>Our</span> Specials</h5>
				<div class="section group">
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/81561-02B40 LENS & BODY, RR COMB 441 357.jpg') }}" style="width:210px; height: 204px;">
						 <h3>LENS & BODY, RR COMB</h3>
						 <p>81561-02B40</p>
						 <h4><span>441.00</span>357.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
					<div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/89422-30030 SENSOR, WATER 142 109.jpg') }}" style="width:210px; height: 204px;">
						 <h3>SENSOR, WATER</h3>
						 <p>89422-30030</p>
						 <h4><span>142.00</span>109.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
				    <div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/53801-02240 FENDER SUB-ASSY, FR 831 415.jpg') }}" style="width:210px; height: 204px;">
						 <h3>FENDER SUB-ASSY, FR</h3>
						 <p>53801-02240</p>
						 <h4><span>831.00</span>415.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
				    <div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/87910-02910 MIRROR ASSY, OUTER R 568 284.jpg') }}" style="width:210px; height: 204px;">
						 <h3>MIRROR ASSY, OUTER R</h3>
						 <p>87910-02910</p>
						 <h4><span>568.00</span>284.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
				    <div class="grid_1_of_5 images_1_of_5">
						 <img src="{{ asset('custom/images/car parts/88310-06441 COMPRESSOR ASSY, WP 5468 3000.webp') }}" style="width:210px; height: 204px;">
						 <h3>COMPRESSOR ASSY, WP</h3>
						 <p>88310-06441</p>
						 <h4><span>5468.00</span>3000.00 SAR</h4>
					     <div class="button"><span><a href="{{ url('singlepage') }}">Read More</a></span></div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection
			

