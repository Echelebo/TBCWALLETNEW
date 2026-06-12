<footer class="foot">
	<div class="container-fluid">					
		<div class="copyright" align="center">
		    <?php $settings = App\Models\site_settings::find(1); ?>
		    {{ __('messages.cpyrght') }} &#169; <a href="/">{{$settings->site_title}}</a> {{ date("Y") }}. {{ __('messages.all_rght_resrvd') }}
		</div>				
	</div>
</footer>

	
	
	