<?php
    $st = App\Models\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head lang="{{ app()->getLocale() }}">
	<title>{{ __('messages.ivt_not') }} </title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="" style="color:{{$st->header_color}}; font-weight: 700; font-size: 24px; text-transform: uppercase;">
                    {{$st->site_title}} 
        	</div>
        	<h3 align="">{{ __('messages.ivt_not') }}</h3>
        	<p>
        	   {{ __('messages.hi') }}, <b>{{$md['username']}}</b> {{ __('messages.yr_ivt_on') }} {{env('APP_URL')}} {{ __('messages.was_suc') }}.
        	   <br>
               {{ __('messages.check_yr_ivt') }}.
        	   
        	</p>
        	<p>
        		<i class="fa fa-certificate">{{env('APP_NAME')}} {{ __('messages.wd_ivt') }}.
        	</p>
        </div>
    </div>
	
</body>
</html>