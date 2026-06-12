@extends('inc.auth_layout')
@section('content')
<body>
    <div>  
        <div class="fixedOeverlayBG" style="background-color: {{$settings->header_color}}"></div>
        <div class="mt--2" style="z-index: -1;">
            <div class="row login_row_cont">
                <div class="col-md-6  d-flex justify-content-center align-items-center position_abs height_100per">
                    <div class="p-2" align="center">
                        <h1 class="text-white text-uppercase xbold">{{$settings->site_title}} </h1>
                        <h4 class="text-white mt-2" >{{$settings->site_descr}}</h4>
                    </div>                    
                </div>
                <div class="col-md-6 bg_white ">
                    <div class="login_fixed_panel ">
                        <div class="row ">
                            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center position_abs padding_0 height_100per scrollable_div_no_bar " style="padding:auto;">
                                <div class="p-2 pad_LR_15per mt-5 pb-5" style="margin:auto;">
                                    <div class="row">  
                                        <div class="col-md-12">
                                             <img src="/img/{{$settings->favicon}}">
                                            <h4 class="text-primary">
                                                {{ __('messages.create_an_act').' '.$settings->site_title  }}
                                            </h4>  
                                        </div> 
                                    </div>

                                    <div class="mt-3 ">
                                        <form method="POST" action="{{ route('register') }}">                                                
                                            <input id="csrf" type="hidden"  name="_token" value="{{ csrf_token() }}" >
                                            <div class="row">                                                    
                                                <div class="col-sm-6 mt-2">
                                                    <label for="Fname">First Name <span class="text-danger">*</span></label>
                                                    <input id="Fname" type="text" class="form-control @error('Fname') is-invalid @enderror regTxtBox" name="Fname" value="{{ old('Fname') }}" required autocomplete="Fname" autofocus placeholder="{{ __('messages.first_name') }}">
                                                    @error('Fname')
                                                        <span class="invalid-feedback" role="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="Lname">Last Name <span class="text-danger">*</span></label>
                                                    <input id="Lname" type="text" class="form-control @error('Lname') is-invalid @enderror regTxtBox" name="Lname" value="{{ old('Lname') }}" required autocomplete="Lname" autofocus placeholder="{{ __('messages.lst_nam') }}">

                                                    @error('Lname')
                                                        <span class="invalid-feedback" role="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="email">Email address <span class="text-danger">*</span></label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror regTxtBox" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('messages.user_login_frm_email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <label for="username">Username <span class="text-danger">*</span></label>
                                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror regTxtBox" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="{{ __('messages.username') }}">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert alert-danger" >
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="password">Password <span class="text-danger">*</span></label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror regTxtBox" name="password" required autocomplete="new-password" placeholder="{{ __('messages.admin_form_pwd') }}">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert alert-danger" >
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                                    <input id="password-confirm" type="password" class="form-control regTxtBox" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('messages.confrm_pwd') }}" >
                                                </div>

                                                <!-- tessss -->

                                            </div>       
                                            <?php
                                                $usn = App\User::where('username', Session::get('ref'))->get();
                                            ?>

                                            <div class="row">
                                                <div class="">
                                                    <input id="ref" type="hidden" class="form-control" name="ref" value="@if(count($usn) > 0){{Session::get('ref')}}@endif" >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    <br><br>
                                                    @if($settings->user_reg == 1)
                                                        <button type="submit" class="collc btn btn-primary with_100per">
                                                            {{ __('messages.register') }}
                                                        </button>
                                                    @else
                                                        <div class="alert alert-danger with_100per"><i class="fa fa-exclamation-triangle"></i>
                                                            {{ __('messages.reg_disabled') }}
                                                        </div>
                                                    @endif
                                                    <br><br>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="" align="left">
                                                   <p>
                                                      <strong> {{ __('messages.alrdy_have_act') }}? <a href="/login" class="float-right">{{ __('messages.login_btn') }}</a></strong>
                                                   </p>                            
                                                </div>
                                            </div>                                      
                                    
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
@endsection
