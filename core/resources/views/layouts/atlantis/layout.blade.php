<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{$settings->site_title}} - {{$settings->site_descr}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/img/{{$settings->favicon}}" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<link href="/atlantis/fontawesome6/css/all.css" rel="stylesheet">
	<link href="/atlantis/fontawesome6/css/brands.css" rel="stylesheet">
	<link href="/atlantis/fontawesome6/css/solid.css" rel="stylesheet">
	<link rel="stylesheet" href="/atlantis/css/fonts.min.css">
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="/atlantis/css/bootstrap.min.css">
	<link rel="stylesheet" href="/atlantis/css/atlantis.min.css">
	<link rel="stylesheet" href="/atlantis/style.css">
	
	<!-- jquery lib -->
	<script src="/atlantis/js/core/jquery.3.2.1.min.js"></script>

</head>

	<body>

		<div class="wrapper">

			@include('layouts.atlantis.header')
			@yield('content')
			@include('layouts.atlantis.footer')

		</div>

		@include('user.inc.alert')

		<div id="err" class="alert alert-danger popup_alert_err" ></div>
		<div id="suc" class="alert alert-success popup_alert_suc"></div>


		<script src="/atlantis/js/core/popper.min.js"></script>
		<script src="/atlantis/js/core/bootstrap.min.js"></script>

		<!-- jQuery UI -->
		<script src="/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

		<!-- jQuery Scrollbar -->
		<script src="/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


		<!-- Chart JS -->
		<script src="/atlantis/js/plugin/chart.js/chart.min.js"></script>

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
		
		<script src="/atlantis/js/moment.js"></script>
		<script src="/atlantis/main.js"></script>
		

		<script>
            $('#dsh_toggle').on('click', function(){
                $('#dash_logo').toggle();
                if($('#dash_logo').is(':visible'))
                {
                    $('#dsh_toggle').addClass('ml_30px_u');
                }
                else
                {
                    $('#dsh_toggle').removeClass('ml_30px_u');
                }
            });
        </script>

        <script>
            var tg = 0;
            $('#mlogo_toggle').on('click', function(){
                // $('#dash_logo').toggle();
                if(tg == 0)
                {
                    // $('#dash_logo').hide();
                    tg = 1;
                }
                else
                {
                    // $('#dash_logo').show();
                    tg = 0;
                }
            });

            $('.nav-link-nav').on('click', function(){
            	window.location.href = "/";
            });
        </script>

		@if(Session::has('status')  && Session::get('msgType') == 'suc')         
		    <script type="text/javascript">
		    	$('#suc').html("{{Session::get('status')}}");            
		        $('#suc').show().animate({ width: "50%" }, "1000").delay(5000).fadeOut(100);
		    </script>
		    {{Session::forget('status')}}
		    {{Session::forget('msgType')}}         
		@elseif(Session::has('status')  && Session::get('msgType') == 'err')        
		    <script type="text/javascript">
		        $('#err').html("{{Session::get('status')}}");            
		        $('#err').show().animate({ width: "50%" }, "1000").delay(5000).fadeOut(100);
		    </script>
		    {{Session::forget('status')}}
		    {{Session::forget('msgType')}}
		@endif


		@if($settings->chat_widget != '' || $settings->chat_widget != null )
	    	{!! $settings->chat_widget !!}
	    @endif

	    @if(Session::has('bank_dep_result') && Session::get('bank_dep_result') == 'suc' )
	    	<script type="text/javascript">
	    		$('#bank_deposit_result').show(1000);
	    	</script>
	    @endif

	    @if(Session::get('toast_type') == 'err' )
			<script type="text/javascript">
				$('#err').html('{{Session::get('toast_msg')}}')
	            $('#err').show().animate({ width: "30%" }, "1000").delay(10000).fadeOut(100);
			</script>
		@endif
		@if(Session::get('toast_type') == 'suc' )
			<script type="text/javascript">
				$('#suc').html('{{Session::get('toast_msg')}}')
	            $('#suc').show().animate({ width: "30%" }, "1000").delay(10000).fadeOut(100);
			</script>
		@endif


		<script >
			$(document).ready(function() {
				$('#basic-datatables').DataTable();			
			});
		</script>
		
		<script type="text/javascript">
	        $(document).ready(function(){
	        	$('#pay_with_bank_dep').on('click', function(){
	        		$('#bank_dets').toggle(1000);
	        	});

	        	$('#bank_deposit_cont').on('click', function(){
	        		$('#bank_deposit_cont_dets').show(1000);
	        	});

	        });
	    </script> 

	    @stack('scripts')
	    @include('sweetalert::alert')
	

		<script src="/atlantis/main.js"></script>
	</body>

</html>