<div class="header">
	<div class="top-header">
		<div class="top-header-left">
			<ul>
				<li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ url('/') }}">Home</a></li>
				<li><a href="#">Specials</a></li>
				<li><a href="#">Delivery</a></li>
				<li class="{{ Request::is('contact') ? 'active' : ''}}" ><a href="{{ url('contact') }}">Contact</a></li>
			</ul>
		</div>
		<div class="top-header-right" style="margin-left:15px;">
			<ul>
				<li><a href="#">LANGUAGE:</a></li>
				<li>
					<select>
						<option>Arabic</option>
						<option>English</option>
					</select>
				</li>
			</ul>
		</div>
		<div class="top-header-right">
			<ul>
				<li><a href="#">CURRENCY:</a></li>
				<li>
					<select>
						<option>Riyal</option>
						<option>Dollar</option>
					</select>
				</li>
			</ul>
		</div>		
		<div class="clear"> </div>
	</div>
	<div class="clear"> </div>
	<div class="sub-header">
		<div class="logo" style="margin-top: -5px">
			<a href="{{ asset('/') }}"><img src="{{ asset('custom/images/logo_rahdan.png') }}" title="logo" /></a>
		</div>
		<div class="sub-header-right">
			<ul>
				<li><a href="{{ route('login') }}">log in</a></li>				
				<li><a href="#">Your account</a></li>
				<li><a href="#">CART: (EMPTY) <img src="{{ asset('custom/images/cart.png') }}" title="cart" /></a></li>
			</ul>
			<input type="text"><input type="submit"  value="search" />
		</div>
		<div class="clear"> </div>
	</div>
	<div class="clear"> </div>
	<div class="top-nav">
		<ul>
			<li><a href="{{ url('carlights') }}">car lights</a></li>
			<li><a href="{{ url('carwheels') }}">Car wheels</a></li>
			<li><a href="{{ url('carbumpers') }}">car bumpers</a></li>
			<li><a href="{{ url('caradsystem') }}">car audiosystem</a></li>
			<li><a href="{{ url('truckbumpers') }}">Truck bumpers</a></li>
			<li><a href="{{ url('contact') }}">Feedback</a></li>
			<div class="clear"> </div>
		</ul>
	</div>
</div>