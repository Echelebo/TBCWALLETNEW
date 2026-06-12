<div class="panel-header bg-primary-gradient" >
	<div class="page-inner py-5" style="background-color: #fff;">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row mt--3">
			<div>
				<h5 class="text-grey mt-4">
					{{ __('messages.hi_wlcm_supadm') }}
				</h5>
				<h4 class="text-primary pb-2 ">					
					{{ucfirst($adm->name)}}					
				</h4>	
				<!-- <p class="text-white">{{str_replace('/', ' > ', ucfirst(Request::path())) }}</p>			 -->
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				@php($role = Session::get('adm'))
                @if($role->role == 3)
					<a href="/admin/manage/investments" class="btn btn-primary btn-border btn-round mr-2">{{ __('messages.investments') }}</a>
					<a href="/admin/manage/deposits" class="btn btn-primary btn-round">{{ __('messages.dpst') }}</a>
				@endif
			</div>
		</div>
	</div>
</div>