@extends('inc.auth_layout')
<title>Verify Account - {{env('APP_NAME')}}</title>
@section('content')
<body>
    <div class="verify_form_cont">
        <img src="/img/adult.jpg" class="fixedOverlayIMG">         
        <div class="fixedOeverlayBG"></div>
        <div class="container">
            <div class="row pad_T90">
                <div class="col-md-4"></div>
                <div class="col-md-4">                    
                    <div class="very_form_div">                        
                        <div class="panel ">
                            <div class="">
                                <div align="center">                                     
                                    <h3 class="colhd"><i class="fa fa-key"></i>{{ __('messages.user_verify_call') }} </h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="panel-body" style="">
                                @if(Session::has('msgType') && Session::get('msgType') == 'err')
                                
                                    <div class="text-danger text-center col-12">
                                        {{Session::get('status')}}
                                    </div>
                                    {{Session::forget('status')}}
                                    {{Session::forget('msgType')}}
                                    
                                @elseif(Session::has('msgType') && Session::get('msgType') == 'suc')
                                
                                    <div class="text-success text-center col-12">
                                        {{Session::get('status')}}
                                    </div>
                                    {{Session::forget('status')}}
                                    {{Session::forget('msgType')}}
                                @else                                
                                    <div class="text-danger col-12">
                                       <p class="text-center">
                                           {{ __('messages.invalid_access') }}
                                       </p>
                                    </div>                                     
                                @endif

                                <div class="form-group row mb-0 mt-5">
                                    <div class="col-12" align="center">
                                       <p class="text-center">
                                           <strong><a href="/login" class="collcc btn btn-warning">{{ __('messages.bck_to_login') }}</a></strong>
                                       </p>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection