<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Spare Parts Website Template | Home :: W3layouts</title>
		<link rel="icon" href="{{ asset('custom/images/logo_rahdan_mini.png') }}" type="image/png" sizes="16x30">
		<link href="{{ asset('custom/css/style.css') }}" rel="stylesheet" type="text/css"  media="all" />
		<link href='//fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ asset('custom/css/responsiveslides.css') }}">
		<script src="{{ asset('custom/js/jquery.min.js') }}"> </script>
		<script src="{{ asset('custom/js/responsiveslides.min.js') }}"></script>		
	  	<script>
	    // You can also use "$(window).load(function() {"
		    $(function () {
		
		      	// Slideshow 1
		      	$("#slider1").responsiveSlides({
		        	maxwidth: 1600,
		        	speed: 600
		      	});
			});
	  	</script>
	</head>
	<body>
		<div class="wrap">			
			
			@include('inc.header')
			
			@yield('content')

			<div class="clear"> </div>
			
			@include('inc.footer')

		</div>
	</body>
</html>

