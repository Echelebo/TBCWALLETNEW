
	
		<div class="main-header box_shadow">
			<!-- Logo Header -->
			<div class="logo-header " style="background-color: #121F3E;" align="center">
				<a class="w-65">
					<span class="d-flex justify-content-between align-items-center w-100 order-2">
						<span id="mlogo_toggle"  class="navbar-toggler sidenav-toggler ml-auto round-hamburger-lg" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						&nbsp;
							<span class="navbar-toggler-icon">
								    <i class="fa fa-bars text-white" style="font-size:18px"></i>
							</span>
						</span>

						<span  class="d-none d-lg-block  order-1"> 
							<span id="dash_logo" class="nav-link-nav text-white text-uppercase xbold font_wgh_900"> 
								{{$settings->site_title}}  
							</span>
						</span>
						<span class="nav-link-nav d-lg-none text-white text-uppercase xbold font_wgh_900 order-1"> 
							{{$settings->site_title}} 
						</span>
					</span>
                </a>
								 
				<button class="topbar-toggler more text-white">
					<i class="fa-solid fa-ellipsis-vertical text-white"></i>
				</button>

				<div class="nav-toggle round-hamburger-lg" >
					<i id="dsh_toggle" style="font-size:18px" class="fa fa-bars text-white btn toggle-sidebar ml_30px_u"></i>
				</div>
			</div>
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #fff;">
				<div class="container-fluid">
				    <div class="collapse" id="search-nav">
					    <h4 class="text-primary">@if(isset($page_title)){{ $page_title }}@endif</h4>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						@php 
							$languages = get_list_lang();
						@endphp

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle text-primary" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fa fa-flag"></i> 
								@if( session()->get('locale') != null)
									{{ strtoupper( session()->get('locale') ) }}
								@else
									{{ __('EN') }}
								@endif
								<i class="fa-solid fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-adm animated fadeIn">

		                        @foreach($languages as $language => $name)
		                        	<li>
										<a class="dropdown-item text-primary" href="{{route('language.change',$name)}}">
		                                    <i class="fa fa-flag"></i> {{  strtoupper( $name ) }}
		                                </a>
									</li>		                            
		                        @endforeach														
																
							</ul>
						</li>

						<li class="nav-item dropdown hidden-caret">&emsp;</li>
						<li class="nav-item dropdown hidden-caret">
							&nbsp;&nbsp;
							<a class="dropdown-toggle text-primary" href="{{ route('support.index')}}" >
								<?php                                  
	                                $msgs = App\Models\ticket::With('comments')->orderby('id', 'desc')->get();
	                                $rd = 0;
	                            ?>								
								<i class="fab fa-teamspeak not_cont text-primary">
									@foreach($msgs as $msg) 
                                        @if($msg->state == 1)                        
                                            @php($rd = 1)                                  
                                        @endif
                                        @foreach($msg->comments as $comment)
                                        	@if($comment->state == 1 && $comment->sender == 'user')
                                        		@php($rd = 1)
                                        	@endif
                                        @endforeach                                   
                                    @endforeach
                                    @if($rd == 1)   
                                    	<i class="fa fa-circle new_not "></i>
                                    @endif									
								</i> {{ __('messages.supt_cntr') }}
							</a>							
						</li>
						
						<li class="nav-item dropdown hidden-caret">&emsp;</li>
						<li class="nav-item dropdown hidden-caret">
							&nbsp;
							<a class="dropdown-toggle profile-pic text-primary" data-toggle="dropdown" href="#" aria-expanded="false">
								@if($adm->img == "")
									<i class="fa-solid fa-circle-user"></i>
								@else							
									<img src="/img/{{ $adm->img }}" alt="avatar" class="avatar-img user_avatar_size_20" align="center" />
								@endif	
								&nbsp;{{ $adm->name }}
								<i class="fa-solid fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-adm animated fadeIn">
								<div class="dropdown-adm-scroll scrollbar-outer">
									<li>																			
										<a class="dropdown-item" href="/admin/manage/users">
											<i class="fa fa-users"></i> &nbsp;{{ __('messages.manage_usr') }}
										</a>
										@php($role = Session::get('adm'))
                                        @if($role->role == 3)
											<a class="dropdown-item" href="/admin/manage/adminUsers">
												<i class="fa fa-users"></i>&nbsp; {{ __('messages.mgr_adm_usr') }}
											</a>
											<a class="dropdown-item" href="/admin/manage/investments">
												<i class="fa fa-paper-plane"></i>&nbsp; {{ __('messages.mang_invstm') }}
											</a>
											<a class="dropdown-item" href="/admin/manage/deposits">
												<i class="fas fa-donate"></i>&nbsp; {{ __('messages.usr_dpst') }}
											</a>
											<a class="dropdown-item" href="/admin/manage/withdrawals">
												<i class="fa fa-file"></i>&nbsp; {{ __('messages.usr_wthdrwl') }} 
											</a>
										@endif

										<a class="dropdown-item" href="/admin/manage/packages">
											<i class="fa fa-briefcase"></i>&nbsp; {{ __('messages.pkgs') }}
										</a>
										<a class="dropdown-item" href="/admin/send/msg">
											<i class="fa fa-bell"></i>&nbsp; {{ __('messages.snd_notifctn') }}
										</a>
										<a class="dropdown-item" href="/admin/change/pwd">
											<i class="fa fa-key"></i>&nbsp; {{ __('messages.chng_pwd') }}
										</a>	
										<a class="dropdown-item" href="{{route('support.index')}}">
											<i class="fab fa-teamspeak"></i>&nbsp; {{ __('messages.sprt_centr') }}
										</a>	

										@php($role = Session::get('adm'))
                                        @if($role->role == 3)		
                                        	<a class="dropdown-item" href="/admin/viewlogs">
												<i class="fa fa-list"></i>&nbsp; {{ __('messages.vw_usr_actv') }}
											</a>
											<a class="dropdown-item" href="/admin/view/settings">
												<i class="fa fa-gears"></i>&nbsp; {{ __('messages.Sttng') }}
											</a>
										@endif								
										
										
										<a class="dropdown-item" href="/logout"><i class="fa fa-arrow-right"></i> &nbsp;{{ __('messages.logout') }}</a>

									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" style="background-color: #121F3E;">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner ">
				<div class="sidebar-content ">					
					<ul class="nav nav-primary all_text_color">
					    <li class="nav-item @if(Request::path() == 'admin/home'){{__('active')}} @endif">
					    	<a class="" href="/admin/home">
								<i class="fa fa-columns fa_1x"></i>
								&emsp;
								<span> {{ __('messages.dasbrd') }}</span>
							</a>
						</li>
						<li class="nav-item  @if(Request::path() == 'admin/profile/settings'){{__('active')}} @endif">
							<a class="" href="/admin/profile/settings">
							    <i class="fa fa-user fa_1x" ></i>&emsp;
								<span class="" >{{ __('messages.prfl') }}</span>
							</a>
						</li>
						@php($role = Session::get('adm'))
                        @if($role->role == 3)
                        	<li class="nav-item ">
								<a data-toggle="collapse" href="#user_drp">
									<i class="fas fa-users fa_1x"></i>&emsp;
									<span> {{ __('messages.manage_usr') }}</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="user_drp" >
									<ul class="nav nav-collapse">
										<li class="@if(Request::path() == 'admin/manage/users'){{__('active')}} @endif">
				                        	<a href="/admin/manage/users">
												<span class="sub-item"> {{ __('messages.users') }} </span>
											</a>
										</li>
										
										<li class="@if(Request::path() == 'admin/manage/adminUsers'){{__('active')}} @endif">
											<a href="/admin/manage/adminUsers">
												<span class="sub-item"> {{ __('messages.admn') }} </span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							
							<li class="nav-item @if(Request::path() == 'admin/manage/investments'){{__('active')}} @endif">
						    	<a href="/admin/manage/investments">
									<i class="fas fa-hand-holding-usd fa_1x"></i>&emsp;
									<span>{{ __('messages.mang_invstm') }}</span>
								</a>
							</li>
							
							<li class="nav-item @if(Request::path() == 'admin/manage/deposits'){{__('active')}} @endif">
						    	<a href="/admin/manage/deposits">
									<i class="fas fa-donate fa_1x"></i>&emsp;
									<span> {{ __('messages.usr_dpst') }} </span>
								</a>
							</li>
							
							<li class="nav-item @if(Request::path() == 'admin/manage/withdrawals'){{__('active')}} @endif">
						    	<a href="/admin/manage/withdrawals">
									<i class="fas fa-arrow-circle-down fa_1x"></i>&emsp;
									<span> {{ __('messages.usr_wthdrwl') }} </span>
								</a>
							</li>
						@endif
						
						<li class="nav-item @if(Request::path() == 'admin/manage/packages'){{__('active')}} @endif">
					    	<a href="/admin/manage/packages">
								<i class="fa fa-briefcase fa_1x"></i>&emsp;
								<span> {{ __('messages.pkgs') }} </span>
							</a>
						</li>
						
						<li class="nav-item @if(Request::path() == 'admin/send/msg'){{__('active')}} @endif">
					    	<a href="/admin/send/msg">
								<i class="fa fa-bell fa_1x"></i>&emsp;
								<span> {{ __('messages.snd_notifctn') }}</span>
							</a>
						</li>
						<li class="nav-item @if(Request::path() == 'support'){{__('active')}} @endif">
					    	<a href="{{route('support.index')}}">
								<i class="fab fa-teamspeak fa_1x"></i>&emsp;
								<span> {{ __('messages.sprt_centr') }} </span>
							</a>
						</li>			

												
                        @if($role->role == 3)
							<li class="nav-item ">
								<a data-toggle="collapse" href="#base">
									<i class="fas fa-wrench fa_1x"></i>&emsp;
									<span>{{ __('messages.Sttng') }}</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="base">
									<ul class="nav nav-collapse">
										<li class=" @if(Request::path() == 'admin/view/settings'){{__('active')}} @endif">
											<a href="/admin/view/settings">
												<span class="sub-item">{{ __('messages.Sttng') }}</span>
											</a>
										</li>
										<li class="@if(Request::path() == 'admin/manage/deposits'){{__('active')}} @endif">
											<a href="/admin/profile/kyc">
												<span class="sub-item">{{ __('messages.kyc') }}</span>
											</a>
										</li>
										<li class="@if(Request::path() == '/languages'){{__('active')}} @endif">
											<a href="{{route('languages.index')}}">
												<span class="sub-item">{{ __('messages.language_settings') }}</span>
											</a>
										</li>
										<li class="@if(Request::path() == 'admin/viewlogs'){{__('active')}} @endif">
				                        	<a href="/admin/viewlogs">
												<span class="sub-item">{{ __('messages.vw_usr_actv') }}</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						@endif	

						
						<li class="nav-item">
							<a href="/logout">
								<i class="fas fa-arrow-left fa_1x"></i>&emsp;
								<span>{{ __('messages.logout') }}</span>
								<!-- <span class="caret"></span> -->
							</a>							
						</li>


						
					</ul>
				</div>
			</div>
		</div>
		