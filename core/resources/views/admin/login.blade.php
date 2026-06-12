@extends('inc.auth_layout')
@section('content')
<body>
    <div class="mt--2">
        <!-- <img src="/img/adult.jpg" class="fixedOverlayIMG">   -->       
        <div class="login_bg_overlay_col " style="background-color: {{$settings->header_color}}"></div>
        <div class="">
            <div class="row admin_login_row">
                <div class="col-md-6  d-flex justify-content-center align-items-center position_abs height_100per">
                    <div class="p-2" align="center">
                        <h1 style="" class="text-white text-uppercase xbold">{{$settings->site_title}} </h1>                        
                        <h4 class="text-white mt-2">                                                       
                            {{ __('messages.admin_login_title') }} 
                        </h4>
                    </div>                    
                </div>
                <div class="col-md-6 bg_white">
                    <div class="login_fixed_panel">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center align-items-center position_abs height_100per">
                                <div class="p-2">
                                    <div class="panel-body" style="margin-left: -6px;" >
                                         <img src="/img/{{$settings->favicon}}">
                                        <h4 class="text-primary">
                                            {{ __('messages.admin_login_frm_title').' '.$settings->site_title }}
                                        </h4> 
                                        <div id="errMsg" class="card-header alert alert-danger cont_display_none" align="center">         
                                        </div>

                                        @if(Session::has('err2') )         
                                            <script type="text/javascript">            
                                                $('#errMsg').html("{{Session::get('err2')}}");
                                                $('#errMsg').show();
                                            </script>
                                            {{Session::forget('err2')}}
                                        @endif
                                    </div>
                                    <div class="panel-body mt-3" >
                                        <form method="POST" action="/dhadmin/login">                        
                                            <input id="csrf" type="hidden"  name="_token" value="{{ csrf_token() }}" >
                                            <div class="form-group row" >
                                                <b>{{ __('messages.admin_frm_email') }}</b>
                                                <input id="" type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
                                                <div class="input-group"> 
                                                    <input id="email" type="email" class="form-control regTxtBox" value="" name="adm_email" required  autofocus placeholder="{{ __('messages.admin_frm_email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback text-danger" role="alert" >
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <b>{{ __('messages.admin_form_pwd') }}</b>
                                                <div class="input-group">
                                                    <input id="password" type="password" value="" class="form-control regTxtBox" name="adm_pwd" required placeholder="{{ __('messages.admin_form_pwd') }}">
                                                    @error('password')
                                                        <span class="invalid-feedback text-danger" role="alert" >
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0 pt-0 pb-0">
                                                <div class="col-md-12 pl-0 pr-0 mt-2" align="center">
                                                    <button type="submit" class="btn btn-primary with_100per">
                                                        {{ __('messages.login_btn') }}
                                                    </button>                               
                                                </div>
                                                <div class="col-md-12 mt-5" align="center">
                                                    <strong><a href="" class="btn border" data-target="#reset_pwd_modal" data-toggle="modal"><i class="fa fa-key"></i> {{ __('messages.pwd_recovery') }}</a></strong>
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
        </div>
    </div>
    <div class="modal fade" id="reset_pwd_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="padding-top:70px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary" id="exampleModalLabel"><b>{{ __('messages.pwd_recovery') }}</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin_reset_pwd')}}">
                        <div class="row"> 
                            <div class="col-md-12">
                                <input type="text" name="admin_email" value="" class="form-control" placeholder="{{ __('messages.admin_frm_email') }}" required >                               
                            </div> 
                            <div class="col-sm-12 mt-3">
                                <input type="submit" class="btn btn-primary" value="Reset">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                                                
                </div>
            </div>
        </div>
    </div>
    
    <div class="floating_lang_div" style="display:none">
       <select id="lang_select" class="lang_select_input">
            <?php
                $activities = $lang;
            ?>
            @if(count($activities) > 0 )
                @foreach($activities as $activity)
                    <option value="{{ $activity->lang_code }}" @if(Session::get('locale') == $activity->lang_code)) {{__('selected')}} @endif><i class="fa fa-flag"></i>{{ strtoupper($activity->lang_code) }}</option>
                @endforeach
            @else
                {{ __('No language') }}
            @endif      
            
        </select>
    </div>
@endsection
