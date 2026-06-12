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
        
                                    @elseif(Session::has('msgType') && Session::get('msgType') == 'suc')
                                    
                                        <div class="alert alert-success">
                                            {{Session::get('status')}}
                                        </div>
                                        {{Session::forget('msgType')}}
                                        {{Session::forget('status')}}                                
                                    @else
                                    @endif
                                    
                                    <h4 class="text-primary ml_5" align="left"></i>{{ __('messages.pwd_recovery2') }}</h4>
                                    
                                    <form method="POST" action="/user/request/change/pwd">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email">{{ __('messages.user_login_frm_email') }}</label>                                        
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 pl-2" align="left">
                                                <button type="submit" class="collcc btn btn-primary">
                                                    {{ __('messages.reset_pwd_btn') }}
                                                </button>
                                                <a href="/login" class="float-right mt-2">
                                                    {{ __('messages.bck_to_login') }}
                                                </a>
                                            </div>
                                            <br><br>                                     
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

