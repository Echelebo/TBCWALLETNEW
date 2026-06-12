<div class="panel-header bg-white" >
	<div class="page-inner py-5 bg-white" >
		<div class="row">
			<div class="col">
				<h6 class="text-grey">
					{{ __('messages.Welcome_dash') }} !
				</h6>
				<h4 class="text-primary">
					{{ $user->firstname }} 
				</h4>		
				<p class="text-grey">{{__('messages.acct_summary')}}</p>
			</div>
			
			<div class="col-xs pr-2" align="right">
				<a href="/{{$user->username}}/investments" class="btn btn-primary btn-border btn-round mr-2">
					{{ __('messages.invest_btn') }}
				</a>
				<a href="/{{$user->username}}/wallet" class="btn btn-secondary btn-round">
					{{ __('messages.dpsts') }}
				</a>
			</div>
		</div>
	</div>
</div>