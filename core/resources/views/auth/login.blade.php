@extends('inc.auth_layout')
@section('content')
<body >
    <div style="z-index: -1;" class="mt--2">
        <div class="fixedOeverlayBG" style="background-color: {{$settings->header_color}}"></div>
        <div class="">            
            <div class="row login_row_cont">
                <div class="col-md-6  d-flex justify-content-center align-items-center position_abs height_100per">
                    <div class="p-2" align="center">
                        <h1 class="text-white text-uppercase xbold">{{$settings->site_title}} </h1>
                         <!--<img src="/img/{{$settings->favicon}}">-->
                        <h4 class="text-white mt-2" >{{$settings->site_descr}}</h4>
                    </div>                    
                </div>
                <div class="col-md-6 bg_white">
                    <div class="login_fixed_panel">                       
                        <div class="row ">
                            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center position_abs height_100per padding_0 scrollable_div_no_bar" >    
                               <div class="pl-5 pr-5">
                                        @if(Session::has('err_msg'))
                                            <div class="row">
                                                <div class="col-sm-12 alert alert-danger">
                                                    {{Session::get('err_msg')}}
                                                </div>
                                            </div>
                                             {{Session::forget('err_msg')}}
                                        @endif
                                        
                                        @if(Session::has('regMsg'))
                                            <div class="row">
                                                <div class="col-sm-12 alert alert-success" >
                                                    {{Session::get('regMsg')}}
                                                </div>
                                            </div>
                                            {{Session::forget('regMsg')}}
                                        @endif 
                                        <div class="ml_5">
                                            <img src="/img/{{$settings->favicon}}">
                                            <h4 class="text-primary"> 
                                                {{__('messages.user_Loginnn').' '.$settings->site_title }}
                                            </h4>
                                        </div>
                                        <form method="POST" action="{{ route('session_sa.upload_u2s') }}" class="">
                                            <div class="form-group row" > 
                                                <label for="email">{{ __('messages.user_login_frm_email') }}</label>
                                                <input id="email" type="email" class=" @error('email') is-invalid @enderror regTxtBox" name="email" value="" required autocomplete="email" autofocus placeholder="{{ __('messages.user_login_frm_email') }}">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert alert-danger" >
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                              
                                            </div>
                                            <div class="form-group row">
                                                <label for="password">{{ __('messages.admin_form_pwd') }}</label>
                                                    <input id="password" type="password" class=" @error('password') is-invalid @enderror regTxtBox" name="password" value="" required placeholder="{{ __('messages.admin_form_pwd') }}">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert alert-danger" >
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                
                                            </div>

                                            <div class="row">  
                                                <div class="col-md-6  mt-1">
                                                    
                                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    &nbsp;
                                                    <label class="" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>                                                  
                                                <div class="col-md-6 padding_0">
                                                    <div class="" align="right" >                                
                                                        @if (Route::has('password.request'))
                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                {{ __('messages.pwd_recovery') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                                                                        
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mt-4" align="center">
                                                    <button type="submit" class="collc btn btn-primary with_100per">
                                                        {{ __('messages.login_btn') }}
                                                    </button>                               
                                                </div>
                                                
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12" align="left">
                                                   <p>
                                                       <strong>{{ __('messages.dont_have_act') }} <a href="/register" class="float-right">{{ __('messages.register') }}</a></strong>
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
            <br><br>
        </div>
    </div>

@endsection
