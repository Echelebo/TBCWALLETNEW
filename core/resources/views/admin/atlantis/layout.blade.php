<?php
	$settings = App\Models\site_settings::find(1);
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{$settings->site_title}} - {{$settings->site_descr}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon"  href="/img/{{$settings->favicon}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<link href="/atlantis/fontawesome6/css/all.css" rel="stylesheet">
	<link href="/atlantis/fontawesome6/css/brands.css" rel="stylesheet">
	<link href="/atlantis/fontawesome6/css/solid.css" rel="stylesheet">
	<link rel="stylesheet" href="/atlantis/css/fonts.min.css">

	<!-- CSS Files -->
	<link rel="stylesheet" href="/atlantis/css/bootstrap.min.css">
	<link rel="stylesheet" href="/atlantis/css/atlantis.min.css">
	<link rel="stylesheet" href="/atlantis/style.css">
	
   
    <!--   Core JS Files   -->
	<script src="/atlantis/js/core/jquery.3.2.1.min.js"></script>
	<script src="/atlantis/js/core/popper.min.js"></script>
	<script src="/atlantis/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="/atlantis/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="/atlantis/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="/atlantis/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="/atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="/atlantis/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="/atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="/atlantis/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="/atlantis/js/atlantis.min.js"></script>

	<!-- <script src="/atlantis/main.js"></script> -->
	<script src="/atlantis/js/moment.js"></script>

	 <!-- tinymce -->
    <script src="/tinymce5/jquery.tinymce.min.js"></script>
    <script src="/tinymce5/tinymce.min.js"></script>
    <!-- tinymce -->
    
</head>

	<body>
		<div class="wrapper">
			@include('admin.atlantis.header')

			@yield('content')

			@include('admin.atlantis.footer')
		</div>
	</body>
	@include('admin.atlantis.scripts')	
	@stack('scripts')
	@include('sweetalert::alert')

</html>