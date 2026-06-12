<?php
    $st = App\Models\site_settings::find(1);
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style=" padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
           <div align="" style="color:{{$st->header_color}}; font-weight: 700; font-size: 24px; text-transform: uppercase;">
                    {{$st->site_title}} 
        	</div>
        	<h3 align="">{{$md['subject']}} </h3>
        	<p>
        	  {{$md['message']}}
        	  <br><br>
        	  Sender email: {{$md['email']}}
        	  <br>
        	  Sender name: {{$md['name']}}
        	</p>
        	
        </div>
    </div>
	
</body>
</html>