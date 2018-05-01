<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Rahdan</title>
		<meta name="description" content="A shop in Khobar Saudi Arabia that sells Genuine Toyota, Lexus and American auto spare parts and provider.">
        <meta name="keywords" content="Lexus, Toyota, American Cars, Spare parts, Khobar, Saudi Arabia, Sale, Shop, Company, Best, Top, Popular, Most">
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
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118508466-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-118508466-1');
	</script>
	<body>
		<div class="wrap">			
			
			@include('inc.header')
			
			@yield('content')

			<div class="clear"> </div>
			
			@include('inc.footer')

		</div>
	</body>
</html>

