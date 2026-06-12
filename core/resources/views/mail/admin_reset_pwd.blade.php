<?php
    $st = App\Models\site_settings::find(1);
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>{{ __('messages.pwd_rst_ttl') }} </title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="" style="color:{{$st->header_color}}; font-weight: 700; font-size: 24px; text-transform: uppercase;">
                    {{$st->site_title}} 
        	</div>
        	<h3 align="">{{ __('messages.pwd_rst_ttl') }}</h3>
        	<p>
        	   {{ __('messages.pwd_req_msg') }} {{env('APP_NAME')}} {{ __('messages.pwd_rq_cont') }} <br> <b>{{ $md['new_pwd'] }}</b>
        	</p>
        	<p>
        		<i class="fa fa-certificate">{{env('APP_NAME')}} {{ __('messages.wd_ivt') }}.
        	</p>
        </div>
    </div>
	
</body>
</html>