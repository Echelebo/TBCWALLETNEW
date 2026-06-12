<?php
    $st = App\Models\site_settings::find(1);
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>{{ __('messages.wd_not_ttl') }} </title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="" style="color:{{$st->header_color}}; font-weight: 700; font-size: 24px; text-transform: uppercase;">
                    {{$st->site_title}} 
        	</div>
        	<h3 align="">{{ __('messages.wd_not_ttl') }}</h3>
        	<p>
        	   {{ __('messages.wd_this_to_not') }} <b>{{$md['username']}}</b> {{ __('messages.has_made_wd') }} {{env('APP_URL')}}
        	   <br>
        	   {{ __('messages.kdly_att_req') }}.
        	</p>
        	<p>
        		<i class="fa fa-certificate">{{$st->site_title}} {{ __('messages.wd_ivt') }}.
        	</p>
        </div>
    </div>
	
</body>
</html>