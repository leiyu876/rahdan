<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rahdan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="{{ asset('custom/images/logo_rahdan_mini.png') }}" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom_adminlte/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('custom_adminlte/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('inc.admin.header')
  @include('inc.admin.aside')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('inc.admin.content_header')
    </section>
    
    <section class="content">
      @include('inc.admin.messages')
      @yield('content')
    </section>
  </div>
  
  @include('inc.admin.footer')
</div>
<script src="{{ asset('custom_adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('custom_adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/dist/js/demo.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
@yield('js')
</body>
</html>
