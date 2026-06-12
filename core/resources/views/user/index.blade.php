@php($breadcome = __('messages.dasbrd'))

@extends('layouts.atlantis.layout')
@Section('content')
		<div class="main-panel">
			<div class="content">
				@include('user.atlantis.main_bar')
				<div class="page-inner mt--5">
					@include('user.atlantis.overview')
					<div id="prnt"></div>
	                <div class="row">
                        <div class="col-md-12">
                            <div class="card pb-5 ">
                                <div class="card-header">
                                    <div class="card-title text-primary">
                                        <h5>{{ __('messages.ref_earn') }}</h5> 
                                    </div>
                                </div>
                                <div class="card-body pb-2">
                                    <p>Use the link below to invite your friends </p>
                                    <div class="alert text_nowrap1 ref_link_copy" >
                                        <i class="fa-solid fa-paperclip text-primary"></i>
                                        <span id="reflnk" class="text_grey2">https://{{env('APP_URL').__('/register/').$user->username}}</span>
                                        <span class="float-right text-primary hand_pointer" title="Copy link" onclick="copy_txt()">
                                            <i class="fa fa-copy"></i> Copy
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title text-primary">
									    <h5>{{ __('messages.avail_pckg') }}</h5> 
								    </div>
								</div>
								<div class="card-body pb-0">
									@include('user.inc.packages')
								</div>
							</div>
						</div>
					</div>

					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h5 class="text-primary">{{ __('messages.recent_activities') }}</h5>
										<div class="card-tools">
											
										</div>
									</div>
								</div>
								<div class="card-body pl-4">
									@foreach( $logs as $log)
										<div class="row border_btm p-2">
											<div class="col-xs d-flex justify-content-center align-items-center">
												@if($log->action == 'deposit')
													<i class="fa fa-circle-arrow-right text-primary fa-2x"></i>
												@endif	
												@if($log->action == 'invest')
													<i class="fa-solid fa-circle-dollar-to-slot fa-2x text-primary"></i>
												@endif	
												@if($log->action == 'wallet_wd')
													<i class="fa fa-circle-arrow-down text-primary fa-2x"></i>
												@endif	
												@if($log->action == 'profile_update')
													<i class="fa fa-circle-user text-primary fa-2x"></i>
												@endif	
												@if($log->action == 'login')
													<i class="fa fa-sign-in-alt text-primary fa-2x"></i>
												@endif										
											</div>
											<div class="col pt-4">
												<h5>{{ $log->title }}</h5>
												<p class="margin_top_n10">{{ $log->created_at }}</p>
											</div>											
											<div class="col-xs d-flex justify-content-center align-items-center float-right pr-4">
												@if($log->action == 'deposit')													
													<span class="textd-success"><b>+{{ $settings->currency }} {{ $log->amt }}</b></span>
												@endif	
												@if($log->action == 'invest')
													<span class=""><b>{{ $settings->currency }} {{ $log->amt }}</b></span>		
												@endif	
												@if($log->action == 'wallet_wd')
													<span class="textd-danger"><b>-{{ $settings->currency }} {{ $log->amt }}</b></span>		
												@endif	
												
											</div>
										</div>
									@endforeach		
									

								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>

			@include('user.inc.confirm_inv')
		


@endSection

@push('scripts')

	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:'{{ count($myInv) }}',
			maxValue:100,
			width:7,
			text: '{{ count($myInv) }}',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		});

		Circles.create({
			id:'circles-2',
			radius:45,
			value:'{{ count($wd) }}',
			maxValue:100,
			width:7,
			text: '{{ count($wd) }}',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		});

		Circles.create({
			id:'circles-3',
			radius:45,
			value:'{{ count($refs) }}',
			maxValue:100,
			width:7,
			text: '{{ count($refs) }}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		});

		Circles.create({
			id:'circles-logs',
			radius:45,
			value:'{{ count($logs) }}',
			maxValue:100,
			width:7,
			text: '{{ count($logs) }}',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		});	
	</script>

@endpush
			