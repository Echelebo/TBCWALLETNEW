@extends('inc.auth_layout')
<title>{{$settings->site_title}} - Password Recovery</title>
@section('content')
<body>
    <div style="z-index: -1;">
        <div class="fixedOeverlayBG" style="background-color: {{$settings->header_color}}"></div>
        <div class="mt--2" style="z-index: -1;">            
            <div class="row login_row_cont">
                <div class="col-md-6  d-flex justify-content-center align-items-center position_abs height_100per">
                    <div class="p-2" align="center">
                        <h1 class="text-white text-uppercase xbold">{{$settings->site_title}} </h1>
                        <h4 class="text-white mt-2" >{{$settings->site_descr}}</h4>
                    </div>                    
                </div>
                <div class="col-md-6 bg_white">
                    <div class="login_fixed_panel">                       
                        <div class="row ">
                            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center position_abs height_100per padding_0 scrollable_div_no_bar" >    
                                <div class="text-left" align="left">                 
                                    @if(Session::has('msgType') && Session::get('msgType') == 'err')                                
                                        <div class="alert alert-danger">
                                            {{Session::get('status')}}
                                        </div>
                                        {{Session::forget('msgType')}}
                                        {{Session::forget('status')}}
                                         
                                    @endif
                               
                                    @if(Session::has('pwd_rst_suc'))
                                        <div class="alert alert-success">
                                            {{Session::get('status')}}
                                        </div>
                                        {{Session::forget('msgType')}}
                                        {{Session::forget('status')}}
                                        {{Session::forget('pwd_rst_suc')}}
                                        
                                    @elseif(Session::has('pwd_reset_err'))
                                        <div class="alert alert-danger">
                                            {{Session::get('pwd_reset_err')}}
                                        </div>
                                        {{Session::forget('pwd_reset_err')}}
                                        <br><br><br>
                                    @else
                                        <form method="POST" action="/user/update/pwd">
                                        @csrf                                    
                                        <div class="form-group row">
                                                <div class="col-md-12">
                                                <label for="password" class=" col-form-label text-md-right">{{ __('messages.new_pwd') }}</label>
                                                <input id="password" type="password" class="regTxtBox @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="password-confirm" class=" col-form-label text-md-right">{{ __('messages.confrm_pwd') }}</label>
                                                <input id="password-confirm" type="password" class="regTxtBox" name="c_pwd" required autocomplete="new-password">
                                            </div>
                                        </div>
        
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12" align="center">
                                                <button type="submit" class="btn btn-primary collc">
                                                    {{ __('messages.reset_pwd_btn') }}
                                                </button>
                                            </div>
                                            <br><br>
                                        </div>
                                    </form>
                                        
                                    @endif
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12" align="center">
                                            <a href="/login">
                                                <i class="fa fa-arrow-left"></i> {{ __('messages.bck_to_login') }}
                                            </a>
                                        </div>
                                        <br><br>
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
