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
                                <div class="pl-5 pr-5" style="width: 60%">
                                    <div class="row">
                                        <div class="col-sm-12 alert alert-success ">
                                            {{__('messages.check_email')}}
                                        </div>
                                    </div>
                                         
                                    <div class="text-center mt-3">
                                        <a href="/confirm/email/resend" class="btn btn_info text-white" style="background-color: {{$settings->header_color}}">
                                            Resend email
                                        </a>
                                    </div> 
                                    @if(Session::has('toast_msg'))
                                        <div class="row">
                                            <div class="col-sm-12 text-center text-danger">
                                                {{Session::get('toast_msg')}}
                                            </div>
                                        </div>
                                    @endif                                   
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12" align="center">
                                       <p>
                                           <strong><a href="/login">{{ __('messages.bck_to_login') }}</a></strong>
                                       </p>                            
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
