	
		<div class="main-header" style="box-shadow: none !important; z-index: 10;">
			<!-- Logo Header -->
			<div class="logo-header user_logo_side_shadow bg-white user_side_border " >
				<a class="w-65">
					<span class="d-flex justify-content-between align-items-center w-100 order-2">
						<span id="mlogo_toggle"  class="navbar-toggler sidenav-toggler ml-auto round-hamburger-lg" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						&nbsp;
							<span class="navbar-toggler-icon">
								    <i class="fa fa-bars text-primary" style="font-size:18px"></i>
							</span>
						</span>

						<span  class="d-none d-lg-block  order-1"> 
							<span id="dash_logo" class="nav-link-nav text-primary text-uppercase xbold font_wgh_900"> 
								{{$settings->site_title}}  
							</span>
						</span>
						<span class="nav-link-nav d-lg-none text-primary text-uppercase xbold font_wgh_900 order-1"> 
							{{$settings->site_title}} 
						</span>
					</span>
                </a>
								 
				<button class="topbar-toggler more text-primary">
					<i class="fa-solid fa-ellipsis-vertical text-primary"></i>
				</button>

				<div class="nav-toggle round-hamburger-lg" >
					<i id="dsh_toggle" style="font-size:18px" class="fa fa-bars text-primary btn toggle-sidebar ml_30px_u"></i>
				</div>
			</div>
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" >
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					    <h4 class="text-primary ">
        					{{ $breadcome }}
        				</h4>
						<!--<form class="navbar-left navbar-form nav-search mr-md-3">							-->
						<!--</form>-->
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle text-primary" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fa fa-flag"></i> 
									@if( session()->get('locale') != null)
										{{ strtoupper( session()->get('locale') ) }}
									@else
										{{ __('EN') }}
									@endif	
								&emsp;				
							</a>
							<ul class="dropdown-menu dropdown-adm animated fadeIn">
								@php 
									$languages = get_list_lang();
								@endphp
								@foreach($languages as $language => $name)
		                        	<li>
										<a class="dropdown-item text-primary" href="{{route('language.change',$name)}}">
		                                    <i class="fa fa-flag"></i> {{  strtoupper( $name ) }}
		                                </a>
									</li>		                            
		                        @endforeach				
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret text-primary">
							<a class=" dropdown-toggle text-primary" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php                                  
	                                $msgs = App\Models\msg::orderby('id', 'desc')->take(5)->get();
	                            ?>								
								<i class="fa fa-bell not_cont text-primary">
									@foreach($msgs as $msg) 
                                        <?php 
                                            $rd = 0;
                                            $str = explode(';', $msg->readers);   
                                            $receiver = explode(';', $msg->users);                                         
                                            if( in_array($user->username, $receiver) || empty($msg->users) )
                                            {
                                            	if(!in_array($user->id, $str))
                                            	{
                                                	$rd = 1;
                                            	}
                                            }                                            
                                        ?>
                                        @if($rd == 1)   
                                        	<i class="fa fa-circle new_not text-primary"></i>
                                        @endif
                                    @endforeach
									
								</i> <span class="text-primary"> {{ __('messages.nots') }} </span><i class="fa fa-chevron-down text-primary"></i>
								&emsp;	
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">	
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">											
                                            @foreach($msgs as $msg)                                            	
                                                <?php 
                                                    $rd = 0;
		                                            $str = explode(';', $msg->readers);   
		                                            $receiver = explode(';', $msg->users);                                         
		                                            if( in_array($user->username, $receiver) || empty($msg->users) )
		                                            {
		                                            	if(!in_array($user->id, $str))
		                                            	{
		                                                	$rd = 1;
		                                            	}
		                                            }                                                   
                                                ?>
                                                @if($rd == 1) 
                                                	<a id="{{$msg->id}}" href="/notification/{{$msg->id}}" >
														<div class="notif-img"> 
															<i class="fa fa-bell fa-2x"></i>
														</div>
														<div class="notif-content " >
															<span class="subject"></span>
															<span class="block">
																{{ $msg->subject }}
															</span>
															<span class="time">{{ $msg->created_at }} ...</span> 
														</div>
													</a>
													@php($rd = 0) 
                                                @endif
                                            @endforeach
											
										</div>										
									</div>
									<div class="dropdown-divider"></div>
									<div align="center">
										<a href="/notifications"> &nbsp; {{ __('messages.view_all') }}</a>
										<br><br>
									</div>
								</li>
								
							</ul>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="">
									@if($user->img != '')
										<img src="/img/profile/{{ $user->img }}" alt="..." class="avatar-img rounded-circle user_avatar_size_20">
									@else
										<img src="/img/any.png" alt="image profile" class="avatar-img rounded-circle user_avatar_size_20">
									@endif	
									{{$user->username}} <i class="fa fa-caret-down"></i>
								</div>								
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">									
									<li>																			
										<a class="dropdown-item" href="/{{$user->username}}/dashboard">
											<i class="fas fa-layer-group"></i> &nbsp; {{ __('messages.dasbrd') }}
										</a>
										<a class="dropdown-item" href="/{{$user->username}}/wallet">
											<i class="fas fa-wallet"></i> &nbsp; {{ __('messages.dpst') }}
										</a>
										<a class="dropdown-item" href="/{{$user->username}}/send_money">
											<i class="fas fa-paper-plane"></i> &nbsp; {{ __('messages.trsfr_fnd') }}
										</a>
										<a class="dropdown-item" href="/{{$user->username}}/investments">
											<i class="fa fa-wallet"></i> &nbsp; {{ __('messages.my_invstm') }} 
										</a>
										<a class="dropdown-item" href="/{{$user->username}}/withdrawal">
											<i class="fa fa-download"></i> &nbsp; {{ __('messages.wthdrwl') }} 
										</a>
										<a class="dropdown-item" href="/{{$user->username}}/downlines">
											<i class="fa fa-users"></i> &nbsp; {{ __('messages.dwnlns') }} 
										</a>
										<a class="dropdown-item" href="{{route('ticket.index')}}">
											<i class="fab fa-teamspeak"></i> &nbsp; {{ __('messages.cntct_sppt') }}
											<?php                                  
				                                $msgs = App\Models\ticket::With('comments')->orderby('id', 'desc')->get();
				                                $rd = 0;
				                            ?>
											@foreach($msgs as $msg)                                     
			                                    @foreach($msg->comments as $comment)
			                                    	@if($comment->state == 1 && $comment->sender == 'support')
			                                    		@php($rd = 1)
			                                    	@endif
			                                    @endforeach                                   
			                                @endforeach
			                                @if($rd == 1)   
			                                	<i class="fa fa-circle new_not text-danger"></i>
			                                @endif
										</a>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logout">
											<i class="fa fa-arrow-right"></i> &nbsp; {{ __('messages.logout') }}
										</a>

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
		<div class="sidebar sidebar-style-2 sidebar_color_temp bg-white user_side_border">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner " >
				<div class="sidebar-content">					
					<ul class="nav nav-primary ">
						<li class="nav-item @if(Request::path() == $user->username.'/dashboard'){{__('active')}}@endif">
							<a href="/{{$user->username}}/dashboard">
								<i class="fas fa-layer-group"></i>
								<p>{{ __('messages.dasbrd') }} </p>								
							</a>							
						</li>
						<li class="nav-item @if(Request::path() == $user->username.'/profile'){{__('active')}}@endif">
							<a href="/{{$user->username}}/profile">
								<i class="fas fa-user"></i>
								<p>{{ __('messages.my_prfl') }} </p>								
							</a>							
						</li>
						<li class="nav-item @if(Request::path() == $user->username.'/wallet'){{__('active')}}@endif">
							<a  href="/{{$user->username}}/wallet">
								<i class="fas fa-wallet"></i>
								<p>{{ __('messages.walt_dpst') }} </p>
							</a>							
						</li>
						<li class="nav-item @if(Request::path() == $user->username.'/send_money'){{__('active')}}@endif">
							<a href="/{{$user->username}}/send_money">
								<i class="fas fa-paper-plane"></i>
								<p>{{ __('messages.trsfr_fnd') }} </p>
							</a>
						</li>
						<li class="nav-item @if(Request::path() == $user->username.'/investments'){{__('active')}}@endif">
							<a href="/{{$user->username}}/investments">
								<i class="fas fa-folder"></i>
								<p>{{ __('messages.my_invstm') }}</p>
							</a>							
						</li>
						
						<li class="nav-item @if(Request::path() == $user->username.'/withdrawal'){{__('active')}}@endif">
							<a href="/{{$user->username}}/withdrawal">
								<i class="fas fa-download"></i>
								<p> {{ __('messages.wthdrwl') }}</p>
							</a>
						</li>
						<li class="nav-item @if(Request::path() == $user->username.'/downlines'){{__('active')}}@endif">
							<a href="/{{$user->username}}/downlines">
								<i class="fas fa-users"></i>
								<p> {{ __('messages.dwnlns') }} </p>
							</a>							
						</li>
						<li class="nav-item @if(Request::path() == 'ticket'){{__('active')}}@endif">
							<a href="{{route('ticket.index')}}">
								<i class="fab fa-teamspeak"></i>
								<p>{{ __('messages.cntct_sppt') }} </p>
								<?php                                  
	                                $msgs = App\Models\ticket::With('comments')->where('user_id', $user->id)->get();
	                                $rd = 0;
	                            ?>
								@foreach($msgs as $msg)                                     
                                    @foreach($msg->comments as $comment)
                                    	@if($comment->state == 1 && $comment->sender == 'support')
                                    		@php($rd = 1)
                                    	@endif
                                    @endforeach                                   
                                @endforeach
                                @if($rd == 1)   
                                	<i class="fa fa-circle new_not text-danger"></i>
                                @endif	

							</a>							
						</li>

						<li class="nav-item">
							<a href="/logout">
								<i class="fas fa-arrow-right"></i>
								<p>{{ __('messages.logout') }} </p>
							</a>							
						</li>

						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->