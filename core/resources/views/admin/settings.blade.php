@php($page_title = __('messages.Sttng'))
@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5 bg-white">
                  <div id="prnt"></div>
                  <div class="row">
                    <div class="col-sm-12 card">
                      <form id="settings_form" action="/admin/update/site/settings" method="post">
                        <ul class="nav nav-tab mb-5 mt-5" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active custom-tab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                              {{ __('messages.genr') }}
                            </a>
                          </li>
                          <!--<li class="nav-item">-->
                          <!--  <a class="nav-link custom-tab" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">-->
                          <!--    {{ __('messages.dpst') }}-->
                          <!--  </a>-->
                          <!--</li>-->
                          <li class="nav-item">
                            <a class="nav-link custom-tab" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                              {{ __('messages.transactions') }}
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link custom-tab" id="referral-tab" data-toggle="pill" href="#referral" role="tab" aria-controls="pills-contact" aria-selected="false">
                              {{ __('messages.refrl') }}
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link custom-tab" id="mail_settings-tab" data-toggle="pill" href="#mail_settings" role="tab" aria-controls="pills-contact" aria-selected="false">
                              {{ __('messages.mail_stt') }}
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link custom-tab" id="pills-contact-tab" data-toggle="pill" href="#payment_setting_tab" role="tab" aria-controls="pills-contact" aria-selected="false">
                              {{ __('messages.pymnt_mthd') }}
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link custom-tab" id="pills-widget-tab" data-toggle="pill" href="#widget_setting_tab" role="tab" aria-controls="pills-contact" aria-selected="false">
                              {{ __('messages.wdgt') }}
                            </a>
                          </li>  
                          <!-- <li class="nav-item">
                            <a class="nav-link custom-tab" id="pills-lang_tab-tab" data-toggle="pill" href="#lang_tab" role="tab" aria-controls="pills-lang_tab" aria-selected="false">
                              {{ __('messages.lang') }}
                            </a>
                          </li> --> 
                          
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                          <div class="p-5 tab-pane fade show active " id="pills-home" role="tabpanel" >
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-primary">{{__('messages.g_stt')}}</h5>
                                        <hr>
                                    </div>
                                </div> 
                                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                              
                              <div class="row margin_top50"> 
                                  <div class="col-md-4">
                                      <h5>{{ __('messages.ste_ttl') }} </h5>
                                      <p class="text_grey2">{{__('messages.ttl_desc')}}</p>
                                  </div> 
                                  <div class="col-md-6">
                                      <input type="text" name="siteTitle" value="{{$settings->site_title}}" class="form-control"  required>
                                  </div>  
                              </div>
                              
                              <div class="row margin_top50"> 
                                  <div class="col-md-4">
                                      <h5>{{ __('messages.ste_dscrpt') }} </h5>
                                      <p class="text_grey2">{{__('messages.mata_desc')}}</p>
                                  </div> 
                                  <div class="col-md-6">
                                      <input type="text" name="siteDescr" value="{{$settings->site_descr}}" class="form-control"  required>
                                  </div>  
                              </div>
                              
                              <div class="row margin_top50"> 
                                  <div class="col-md-4">
                                      <h5>{{ __('messages.ste_lgo') }} </h5>
                                      <p class="text_grey2">{{__('messages.stt_up_px')}}</p>
                                  </div>
                                  <div class="col-md-4">
                                      <input id="logo_sel_input" type="file" name="siteLogo" class="form-control btn btn-white" >
                                      <p class="text_grey2">{{__('messages.upl_desc')}}</p>
                                  </div>
                                  <div class="col-md-4" align="left"> 
                                        <img src="/img/{{$settings->favicon}}" alt="favicon" class="height_50" align="center" >
                                  </div>                                                
                              </div>

                              <div class="row margin_top50">    
                                  <div class="col-md-4 ">
                                    <h5> {{ __('messages.landing_page') }} </h5>
                                    <small class="text_grey2">{{__('messages.page_to_display')}}</small><br>
                                    <small class="text-danger">{{ __('messages.empty_homepage') }}</small>
                                  </div> 
                                  <div class="col-md-6">
                                    <input type="text" name="homepage" value="{{env('HOME_PAGE')}}" class="form-control" placeholder="{{ __('messages.empty_homepage') }}" >
                                    <small class="text-danger">{{ __('Ex. https://maxprofit.mcode.me/login') }}</small>
                                  </div>                                            
                              </div>
                              
                              <div class="row margin_top100">
                                  <div class="col-md-12" align="left"> 
                                        <h5 class="text-primary">{{__('messages.color_scheme')}}</h5>
                                        <hr>
                                  </div>                                                
                              </div>
                               
                              
                              <div class="row margin_top50">                                               
                                <div class="col-md-4" align="">
                                    <h5>{{ __('messages.hedr_clr') }} </h5>
                                    <p class="text_grey2">{{__('messages.header_color_mode')}}</p>
                                </div> 
                                <div class="col-md-6" align="">
                                    <input id="input_hcolor" value="{{$settings->header_color}}" class="p-0 color_picker " type="color"  name="hcolor" required >
                                </div>                                        
                              </div>
                              
                              <div class="row margin_top50">                                               
                                <div class="col-md-4" align="">
                                    <h5>{{ __('messages.fotr_clr') }} </h5>
                                    <p class="text_grey2">{{__('messages.footer_color_mode')}}</p>
                                </div> 
                                <div class="col-md-6" align="">
                                    <input id="input_fcolor" value="{{$settings->footer_color}}" class="p-0 color_picker" type="color"  name="fcolor" required >
                                </div>                                        
                              </div>
                              
                              <div class="row margin_top100">
                                  <div class="col-md-12" align="left"> 
                                        <h5 class="text-primary">{{__('messages.reg_sett')}}</h5>
                                        <hr>
                                  </div>                                                
                              </div>
                              
                              <div class="row margin_top50"> 
                                  <div   class="col-md-4">
                                      <h5> {{ __('messages.enbl_usr_reg') }} </h5>
                                      <span> {{ __('messages.user_reg_sett_subtext') }} </span>
                                  </div>                                               
                                  <div class="col-md-4">             
                                      <label class="switch">
                                        <input id="reg" type="checkbox" name="reg" value="{{$settings->user_reg}}" @if($settings->user_reg == 1){{('checked')}}@endif>
                                        <span id="" class="slider round" onclick="checkedOnOff('reg')"></span>
                                      </label> 
                                  </div>                                                
                              </div>
                              <div class="row margin_top50"> 
                                  <div   class="col-md-4">
                                      <h5> {{ __('messages.enable_email_conf') }} </h5>
                                      <span> {{ __('messages.enable_email_conf_subtext') }} </span>
                                  </div>                                               
                                  <div class="col-md-4">             
                                      <label class="switch">
                                        <input id="reg_email_confirm" type="checkbox" name="reg_email_confirm" value="@if(env('EMAIL_CONFIRM') == 1){{__('1')}}@else{{__('0')}}@endif" @if(env('EMAIL_CONFIRM') == 1){{('checked')}}@endif>
                                        <span class="slider round" onclick="checkedOnOff('reg_email_confirm')"></span>
                                      </label> 
                                  </div>                                                
                              </div>
                              
                              <div class="row margin_top100">
                                  <div class="col-md-12" align="left"> 
                                        <h5 class="text-primary">{{__('messages.tran_sett')}}</h5>
                                        <hr>
                                  </div>                                                
                              </div>
                              
                              <div class="row margin_top50"> 
                                <div class="col-md-4">
                                    <h5> {{ __('messages.enbl_invstm') }}  </h5>
                                    <p class="text_grey2">{{__('messages.inv_sett_desc')}}</p>
                                </div>                                               
                                <div class="col-md-4">
                                    <label class="switch">
                                      <input id="inv" type="checkbox" name="inv"  value="{{$settings->investment}}" @if($settings->investment == 1){{('checked')}}@endif>
                                      <span id="" class="slider round" onclick="checkedOnOff('inv')"></span>
                                    </label> 
                                </div>                                                
                              </div>
                              
                              <div class="row margin_top50">
                                    <div class="col-md-4">
                                        <h5> {{ __('messages.wthdrwl') }}  </h5>
                                        <p class="text_grey2">{{__('messages.deb_sett_wdr')}}</p>
                                    </div>
                                    <div class="col-md-4 mt-2">            
                                        <label class="switch">
                                          <input id="wd" type="checkbox" name="wd" value="{{$settings->withdrawal}}" @if($settings->withdrawal == 1){{'checked'}}@endif>
                                          <span id="" class="slider round" onclick="checkedOnOff('wd')"></span>
                                        </label> 
                                    </div> 
                              </div>
                              
                              <div class="row margin_top50">
                                    <div class="col-md-4 mt-3" > 
                                        <h5>{{__('messages.dpst')}}</h5>
                                        <p class="text_grey2">{{__('messages.deb_sett_desc')}}</p>
                                    </div> 
                                    <div class="col-md-4 mt-3" >            
                                        <label class="switch">
                                        <input id="wallet" type="checkbox" name="wallet"  value="{{$settings->deposit}}" @if($settings->deposit == 1){{'checked'}}@endif>
                                          <span id="" class="slider round" onclick="checkedOnOff('wallet')"></span>
                                        </label>
                                    </div> 
                              </div> 

                              <div class="row margin_top50"> 
                                <div class="col-md-4">
                                    <h5>{{ __('messages.enable_usr_tran') }}  </h5>
                                    <p class="text_grey2">{{__('messages.user_fund_trans_sett')}}</p>
                                </div>                                               
                                <div class="col-md-4" >              
                                    <label class="switch">
                                      <input id="user_trans" type="checkbox" name="user_trans"  value="{{$settings->user_transfer}}" @if($settings->user_transfer == 1){{('checked')}}@endif>
                                      <span id="" class="slider round" onclick="checkedOnOff('user_trans')"></span>
                                    </label> 
                                </div>                                                
                              </div>
                              
                              <div class="row margin_top100">
                                  <div class="col-md-12" align="left"> 
                                        <h5 class="text-primary">{{__('messages.curncy_sett')}}</h5>
                                        <hr>
                                  </div>                                                
                              </div>
                              
                              <div class="row margin_top50">    
                                  <div class="col-md-4 ">
                                      <h5> {{ __('messages.curncy_code') }} </h5>
                                      <p class="text_grey2">{{__('messages.base_cur')}}</p>
                                  </div> 
                                  <div class="col-md-6">
                                        <!--<div class="input-group">-->
                                        <!--    <div class="input-group-prepend">-->
                                        <!--        <span class="btn btn-primary">{{__('messages.cur_cur')}} {{$settings->currency}}</span>-->
                                        <!--    </div>-->
                                            @include('admin.temp.currencies')
                                            
                                        <!--</div>-->
                                        <span class="text-danger float-right">{{__('messages.cur_cur')}} {{$settings->currency}}</span>
                                  </div>                                            
                              </div>
                              
                              <div class="row margin_top50">    
                                  <div class="col-md-4 ">
                                          <h5> {{ __('messages.curncy_rte') }} </h5>
                                          <p class="text_grey2">{{__('messages.base_cur_rate')}}</p>
                                  </div> 
                                  <div class="col-md-6">
                                        <input type="text" name="cur_conv" value="{{$settings->currency_conversion}}" class="form-control"  required >
                                  </div>                                            
                              </div>

                            </div>
                          </div>

<!--///////   transactions tab        ///////////////////////////////////////////////////////-->

                          <div class="p-5 tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-md-12 " align="left"> 
                                        <h5 class="text-primary">{{__('messages.usr_reqst2')}}</h5>
                                        <hr>
                                    </div>                                                
                                </div>
                                <div class="row margin_top50"> 
                                    <div class="col-sm-4">
                                        <h5> {{ __('messages.min_wdwal') }} </h5>
                                        <p class="text_grey2">{{__('messages.min_wdr_sett')}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" name="min_wd" value="{{env('MIN_WD')}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="row margin_top50"> 
                                  <div class="col-sm-4">
                                    <h5> {{ __('messages.wd_limit') }} </h5>
                                    <p class="text_grey2">{{__('messages.limit_wdr_sett')}}</p>
                                  </div>
                                  <div class="col-sm-6">
                                    <input type="number" name="wd_limit" value="{{env('WD_LIMIT')}}" class="form-control" >
                                  </div> 
                                </div>
                                <div class="row margin_top50">                                     
                                  <div class="col-sm-4">
                                    <h5> {{ __('messages.wd_fee') }} </h5>
                                    <p class="text_grey2">{{__('messages.fee_wdr_sett')}}</p>
                                  </div>
                                  <div class="col-sm-6">
                                    <input type="number" name="wd_fee" value="{{env('WD_FEE')*100}}" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="row margin_top100">
                                      <div class="col-md-12" align="left"> 
                                            <h5 class="text-primary">{{__('messages.dpst')}}</h5>
                                            <hr>
                                      </div>                                                
                                </div>
                                
                                <div class="row margin_top50"> 
                                    <div class="col-md-4">
                                        <h5> {{ __('messages.min_dpt_set').$settings->currency.__('messages.close_brkt') }} </h5>
                                        <p class="text_grey2">{{__('messages.min_dep_sett')}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="min_dep" value="{{env('MIN_DEPOSIT')}}" class="form-control"  step="0.01" required>
                                    </div>
                                </div>
                                <div class="row margin_top50"> 
                                    <div class="col-md-4">
                                        <h5> {{ __('messages.max_dep_set').$settings->currency.__('messages.close_brkt') }} </h5>
                                        <p class="text_grey2">{{__('messages.max_dep_sett')}}</p>
                                    </div>  
                                    <div class="col-md-6">
                                        <input type="number" name="max_dep" value="{{env('MAX_DEPOSIT')}}" class="form-control"  step="1" required>
                                    </div>  
                                </div>
                            </div>
                          </div>
                          
                          
<!--//////    referral tab ////////////////////////////////////////////////////////////////////////////-->

                            <div class="tab-pane fade p-5 " id="referral" role="tabpanel" aria-labelledby="referral-tab">
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-12 " align="left"> 
                                            <h5 class="text-primary">{{__('messages.ref_sett_ttl')}}</h5>
                                            <hr>
                                        </div>                                                
                                    </div>
                                    
                                    <div class="row ">                                 
                                        <div class="col-sm-4">
                                            <h5>{{ __('messages.ref_sys') }} </h5>
                                            <p class="text_grey2">{{__('messages.enable_dis')}}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                              <input id="referal_system" type="checkbox" name="referal_system"  value="@if(env('REF_SYSTEM') == 'Multi_level' ){{__('Multi_level')}}@else{{__('Single_level')}}@endif" @if(env('REF_SYSTEM') == 'Multi_level' ){{('checked')}}@endif>
                                              <span class="slider round" onclick="toggle_ref_sett('referal_system')"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row margin_top50">   
                                        <div class="col-sm-4">
                                            <h5>{{ __('messages.referral_type') }} </h5>
                                            <p class="text_grey2">{{__('messages.choose_ref_type')}}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="referal_type" >
                                                @if(env('REF_TYPE') == 'Once')
                                                    <option value="Once" selected>{{ __('messages.ref_once_ivt') }}</option>
                                                    <option value="Continous">{{ __('messages.ref_cont_ivt') }}</option>
                                                @else
                                                    <option value="Once">{{ __('messages.ref_once_ivt') }}</option>
                                                    <option value="Continous" selected>{{ __('messages.ref_cont_ivt') }}</option>
                                                @endif
                                            </select> 
                                        </div>
        
                                    </div>
        
                                    <div id="Multi_level_settings" class="@if(env('REF_SYSTEM') != 'Multi_level'){{__('cont_display_none')}}@endif">
                                        <div class="row margin_top50 mt-5">
                                            <div class="col-sm-4"> 
                                                <h6> {{ __('messages.ref_lvl') }} </h6>
                                                <p class="text_grey2">{{__('messages.choose_ref_type')}}</p>
                                            </div>
                                            <div class="col-sm-6">   
                                                <input type="number" name="referal_levels" value="{{env('REF_LEVEL_CNT')}}" class="form-control" onkeyup="set_inputs(this.value)" > 
                                                <small class="font_11">{{ __('messages.entr_1_single') }} </small>
                                            </div>                                                 
                                        </div> 
                                    
                                        <div id="row warning_div" class="row mt-5">
                                            <div class="col-sm-12 alert alert-warning text-center">{{ __('messages.entr_ref_per') }} </div>
                                        </div> 
        
                                        <div id="referal_levels_div" >                                                 
                                            @php($ref_set = get_ref_set())
                                            @foreach($ref_set as $ref_item)
                                                <div class="row mt-5 ">
                                                    <div class="col-sm-4 form-group">
                                                        <h6> {{ __('messages.lvl').$ref_item->name}} {{ __('messages.percentage') }} </h6>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <input type="number" step="any" name="{{$ref_item->name}}" value="{{$ref_item->val*100}}" class="form-control" >
                                                    </div>
                                                </div>    
                                            @endforeach                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--//////   Mail Settings //////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="p-5 tab-pane fade " id="mail_settings" role="tabpanel" aria-labelledby="mail_settings-tab">
                                <div class="form-group">
                                    <div class="row "> 
                                        <div class="col-sm-12 ">
                                            <h5 class="text-primary"> {{ __('messages.mail_setup') }}</h5>
                                        </div>
                                        <div   class="col-md-6 ">
                                            <br>
                                            <div class="mt-5">
                                                <h5> {{ __('messages.mail_host') }} </h5>
                                                <input type="text" name="m_host" value="{{env('MAIL_HOST')}}" class="form-control"  >
                                            </div>
                                            <div class="mt-5">
                                                <h5> {{ __('messages.mail_port') }} </h5>
                                                <input type="text" name="m_port" value="{{env('MAIL_PORT')}}" class="form-control"  >
                                            </div>
                                            <div class="mt-5">
                                                <h5> {{ __('messages.mail_encryp') }} </h5>
                                                <input type="text" name="m_enc" value="{{env('MAIL_ENCRYPTION')}}" class="form-control" >
                                            </div>
                                        </div> 
                                        <div   class="col-md-6 ">
                                            <br>
                                            <div class="mt-5">
                                                <h5> {{ __('messages.mail_username') }} </h5>
                                                <input type="text" name="m_user" value="{{env('MAIL_USERNAME')}}" class="form-control"  >
                                            </div>
                                            <div class="mt-5">
                                                <h5> {{ __('messages.mail_pwd') }} </h5>
                                                <input type="password" name="m_pwd" value="{{env('MAIL_PASSWORD')}}" class="form-control" >
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row margin_top100">
                                        <div class="col-sm-12 margin_top50 ">
                                            <h5 class="text-primary"> {{ __('messages.email_not_sett') }}</h5>
                                        </div>
                                        <div class="col-sm-6 mt-5">
                                            <h5> {{ __('messages.mail_sender') }} </h5>
                                            <input type="text" name="m_sender" value="{{env('APP_URL')}}" disabled class="form-control" >
                                        </div>
                                        <div class="col-sm-6 mt-5">
                                            <h5> {{ __('messages.sppt_emil') }} </h5>
                                            <input type="text" name="supEmail" value="{{env('SUPPORT_EMAIL')}}" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--////////// payment settings /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="p-5 tab-pane fade pl_20" id="payment_setting_tab" role="tabpanel" aria-labelledby="payment_setting_tab-tab">
                                <div class="col-sm-12 ">
                                    <h5 class="text-primary"> {{ __('messages.pymnt_mthd') }}</h5>
                                </div>
                                <div class="row margin_top100 pl-3">                               
                                    <div class="col-md-4 ">
                                        <img src="/img/paypal.png" alt="Paypal" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="switch_paypal" type="checkbox" name="switch_paypal"  value="{{env('SWITCH_PAYPAL')}}" @if(env('SWITCH_PAYPAL') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('switch_paypal')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#ppal_p_method"></i>
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/stripe.png" alt="Paypal" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="switch_stripe" type="checkbox" name="switch_stripe"  value="{{env('SWITCH_STRIPE')}}" @if(env('SWITCH_STRIPE') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('switch_stripe')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#stripe_p_method"></i>
                                    </div> 
                                </div>
                                <hr>
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/bnk.jpg" alt="Bank" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="switch_bank_deposit" type="checkbox" name="switch_bank_deposit"  value="{{env('BANK_DEPOSIT_SWITCH')}}" @if(env('BANK_DEPOSIT_SWITCH') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('switch_bank_deposit')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#bank_p_method"></i>
                                    </div> 
                                    
                                </div>
                                <hr>
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/coinpyt.png" alt="Coinpayment" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="switch_BTC" type="checkbox" name="switch_BTC"  value="{{env('SWITCH_BTC')}}" @if(env('SWITCH_BTC') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('switch_BTC')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#cp_p_method"></i>
                                    </div> 
                                </div>
                                <hr>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/cbase2.png" alt="Coinbase" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                          <input id="coinbase_switch" type="checkbox" name="coinbase_switch"  value="{{ env('COINBASE_SWITCH') }}" @if(env('COINBASE_SWITCH') == 1){{'checked'}}@endif>
                                          <span id="" class="slider round" onclick="checkedOnOff('coinbase_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#coinbase_p_method"></i>
                                    </div> 
                                    
                                </div>
                                <hr>
                                
                                <!--<div class="row margin_top50 pl-3">-->
                                <!--    <div class="col-md-4 ">-->
                                <!--        <img src="/img/bcimg.png" alt="Blockchain" class="text-primary payment_methods_img"/>-->
                                <!--        <span class="text-primary">Blockchain</span>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-4 d-flex align-item-center" >-->
                                <!--        <label class="switch">-->
                                <!--            <input id="bc_switch" type="checkbox" name="bc_switch"  value="{{ env('BC_SWITCH') }}" @if(env('BC_SWITCH') == 1){{'checked'}}@endif>-->
                                <!--            <span id="" class="slider round" onclick="checkedOnOff('bc_switch')"></span>-->
                                <!--        </label>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-4 ">-->
                                <!--        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#bcm_p_method"></i>-->
                                <!--    </div> -->
                                <!--</div>-->
                                <!--<hr>-->
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/bcimg.png" alt="Blockchain" class="text-primary payment_methods_img"/>
                                        <span class="text-primary">Manual BTC Wallet</span>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="mbc_switch" type="checkbox" name="mbc_switch"  value="{{ env('MBC_SWITCH') }}" @if(env('MBC_SWITCH') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('mbc_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#mbc_p_wallet"></i>
                                    </div> 
                                </div>
                                <hr>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/paystack22.png" alt="Paystack" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="paystack_switch" type="checkbox" name="paystack_switch"  value="{{ env('PAYSTACK_SWITCH') }}" @if(env('PAYSTACK_SWITCH') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('paystack_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#pstack_p_method"></i>
                                    </div> 
                                </div>
                                <hr>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/flutterwave.png" alt="flutter" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                            <input id="flutter_switch" type="checkbox" name="flutter_switch"  value="{{ env('FLUTTER_SWITCH') }}" @if(env('FLUTTER_SWITCH') == 1){{'checked'}}@endif>
                                            <span id="" class="slider round" onclick="checkedOnOff('flutter_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#flutter_p_method"></i>
                                    </div> 
                                </div>
                                <hr>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/payeer.png" alt="Paypal" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                          <input id="payeer_switch" type="checkbox" name="payeer_switch"  value="{{ env('PAYEER_SWITCH') }}" @if(env('PAYEER_SWITCH') == 1){{'checked'}}@endif>
                                          <span id="" class="slider round" onclick="checkedOnOff('payeer_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#payeer_p_method"></i>
                                    </div> 
                                </div>
                                <hr>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="http://www.deminetsolution.biz/slides/slide4.jpg" alt="Perfect Money" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                          <input id="pm_switch" type="checkbox" name="pm_switch"  value="{{ env('PM_SWITCH') }}" @if(env('PM_SWITCH') == 1){{'checked'}}@endif>
                                          <span class="slider round" onclick="checkedOnOff('pm_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#pm_p_method"></i>
                                    </div>
                                </div>
                                
                                <div class="row margin_top50 pl-3">
                                    <div class="col-md-4 ">
                                        <img src="/img/razorpay.jpg" height="50px" alt="Razorpay" class="text-primary payment_methods_img"/>
                                    </div>
                                    <div class="col-md-4 d-flex align-item-center" >
                                        <label class="switch">
                                          <input id="rzp_switch" type="checkbox" name="rzp_switch"  value="{{ env('RAZOR_PAY_SWITCH') }}" @if(env('RAZOR_PAY_SWITCH') == 1){{'checked'}}@endif>
                                          <span class="slider round" onclick="checkedOnOff('rzp_switch')"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 ">
                                        <i title="Edit" class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#rzp_switch_modal"></i>
                                    </div>
                                </div>
                            </div>
<!--//////   Widget settings /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="p-5 tab-pane fade " id="widget_setting_tab" role="tabpanel" aria-labelledby="widget_setting_tab-tab">
                                <div class="row pl-3">
                                    <div  class="col-md-12">
                                        <h5 class="text-primary">{{ __('messages.wdgt_sett') }}</h5>
                                    </div>
                                </div>
                                <div class="row margin_top50 pl-1">                               
                                    <div   class="col-md-12 ">
                                      <div class="pad_20">
                                        <div class="d-flex align-items-center">
                                          <h5 class="mt-2 text-primary">{{ __('messages.chat_wdget') }} </h5>&nbsp;  <span> <i class="fa fa-code"></i></span>
                                        </div>
                                          <div class="form-group">
                                              <textarea name="chat_widget" class="form-control" rows="10" placeholder="Paste your widget code here" >@if($settings->chat_widget != null || $settings->chat_widget != ''){{$settings->chat_widget}}@endif</textarea>
                                          </div>                                      
                                      </div>
                                    </div> 
                                    <div   class="col-md-12 margin_top100 pl-1">
                                      <div class="pad_20">
                                        <div class="d-flex align-items-center">
                                          <h5 class="mt-2 text-primary">{{ __('messages.ggle_analytic') }} </h5>&nbsp;  <span> <i class="fa fa-code"></i></span>
                                        </div>
                                          <div class="form-group">
                                              <textarea name="ggle_analyt_widget" class="form-control" rows="10" placeholder="Paste your widget code here" >@if(!is_null($settings->google_analytics) || $settings->google_analytics != ''){{$settings->google_analytics}}@endif</textarea>
                                          </div>                                      
                                      </div>
                                    </div>
                                </div>
                            </div>
<!--/// Language settings  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="p-5 tab-pane fade " id="lang_tab" role="tabpanel" aria-labelledby="lang_tab-tab">
                                <div class="row "> 
                                    <div class="col-md-12 mt-5"> 
                                        <a class="float-right btn btn-primary text-white" data-toggle="modal" data-target="#add_lang_modal"><i class="fas fa-plus"></i> {{ __('messages.add_lang') }}</a>
                                        <table id="" class=" table table-stripped table-hover mt-5">
                                            <thead>
                                              <tr>                
                                                  <th> {{ __('messages.lang_name') }} </th>
                                                  <th> {{ __('messages.lang_abbr') }} </th>
                                                  <th> {{ __('messages.actn') }} </th>   
                                              </tr>
                                            </thead>
                                            <tbody>
    
                                              <?php
                                                  $activities = $lang;
                                              ?>
                                              @if(count($activities) > 0 )
                                                  @foreach($activities as $activity)
                                                      <tr>                                                            
                                                          <td>{{$activity->lang_name}}</td>
                                                          <td>{{$activity->lang_code}}</td>
                                                          <td>
                                                              <a class="btn btn-danger" href="{{route('lang_del', ['id' => $activity->id])}}"><i class="fa fa-times"></i></a>
                                                          </td>                    
                                                      </tr>
                                                  @endforeach
                                              @else
                                                  
                                              @endif
                                            </tbody>
                                        </table>                         
                                    </div>                               
                                </div>
                            </div>
                        </div>

                        <div class="row margin_top50 mb-5"> 
                          <div   class="col-md-12">
                            <button class="btn btn-primary float-right" onclick="load_post_ajax('/admin/update/site/settings', 'settings_form', 'admin_settings_form' )" > 
                              {{ __('messages.save_settings') }} 
                            </button>
                          </div>                                     
                        </div>

                      </form>                      
                    </div>
                  </div>
                </div>
            </div>
            <div id="add_lang_modal" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
				<div class="modal-dialog ">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-primary">
								{{ __('messages.add_lang')}}
							</h5>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						    <form id="form_add_lang" action="{{route('add_lang')}}" method="post">
                                <div class="row ">
                                    <div class="col-md-4 form-group mt-1">
                                      <h5> {{ __('messages.lang_name') }} </h5>
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <input type="text" name="lang_name" value="" required class="form-control"  >
                                  </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4 form-group mt-1">
                                      <h5> {{ __('messages.lang_abbr') }} </h5>
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <input type="text" name="lang_code" value="" required class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class=" col-sm-6 ">                                   
                                        <button id="add_lang_btn" class="btn btn-primary with_100per">{{ __('messages.add') }}</button>
                                    </div>
                                </div>
                                
                            </form>
					    </div>
					</div>
				</div>
			</div> 
			
			<div id="ppal_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{__('messages.paypal_setup')}}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_paypal_settings')}}" method="post">
            			        <div class="form-group">
                                    <h5> {{ __('messages.paypal_id') }} </h5>
                                    <input type="text" name="paypal_ID" value="{{$settings->paypal_ID}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.paypal_secrete') }} </h5>
                                    <input type="text" name="paypal_secret" value="{{$settings->paypal_secret}}" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.Mode') }} </h5>
                                    <select class="form-control" name="paypal_mode" >
                                        <option value="sandbox">{{ __('messages.sandbox') }}</option>
                                        <option value="live">{{ __('messages.live') }}</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="stripe_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.stripe_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_stripe_settings')}}" method="post">
            			        <div class="form-group">
                                      <h5> {{ __('messages.stripe_key') }} </h5>
                                      <input type="text" name="stripe_key" value="{{$settings->stripe_key}}" class="form-control"   >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('messages.stripe_secrete') }} </h5>
                                      <input type="text" name="stripe_secret" value="{{$settings->stripe_secret}}" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="bank_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.bank_dep_set') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_bank_settings')}}" method="post">
            			        <div class="form-group">
                                      <h5> {{ __('messages.bnk_nam') }} </h5>
                                      <input type="text" name="bank_name" value="{{env('BANK_NAME')}}" class="form-control" placeholder=""  >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('messages.act_nam') }} </h5>
                                      <input type="text" name="act_name" value="{{env('ACCOUNT_NAME')}}" class="form-control" placeholder="" >
                                </div>  
                                <div class="form-group">
                                      <h5> {{ __('messages.act_numb') }} </h5>
                                      <input type="number" name="act_no" value="{{env('ACCOUNT_NUMBER')}}" class="form-control" placeholder="" >
                                </div> 
                                <div class="form-group">
                                      <h5> {{ __('messages.route_iban') }} </h5>
                                      <input type="number" name="route_iban" value="{{env('ROUTE_IBAN_NUMBER')}}" class="form-control" placeholder="" >
                                </div> 
                                <div class="form-group">
                                      <h5> {{ __('messages.resp_email') }} </h5>
                                      <input type="email" name="dep_email" value="{{env('BANK_DEPOSIT_EMAIL')}}" class="form-control" placeholder="" >
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="cp_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.cp_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_coinpayment_settings')}}" method="post">
            			        <div class="form-group">
                                    <h5> {{ __('messages.cp_mer_id') }} </h5>
                                     <input type="text" name="cp_m_id" value="{{env('COINPAYMENTS_MERCHANT_ID')}}" class="form-control" placeholder=""  >
                                </div>  
                                <div class="form-group">
                                    <h5> {{ __('messages.cp_pub_key') }} </h5>
                                    <input type="text" name="cp_p_key" value="{{env('COINPAYMENTS_PUBLIC_KEY')}}" class="form-control" placeholder=""  >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.cp_pri_key') }} </h5>
                                    <input type="text" name="cp_pr_key" value="{{env('COINPAYMENTS_PRIVATE_KEY')}}" class="form-control" placeholder=""  >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.cp_ipn_secr') }} </h5>
                                    <input type="text" name="cp_ipn_secret" value="{{env('COINPAYMENTS_IPN_SECRET')}}" class="form-control" placeholder=""  >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.cp_ipn_url') }} </h5>
                                    <input type="text" name="cp_ipn_url" value="{{env('COINPAYMENTS_IPN_URL')}}" class="form-control" placeholder=""  >
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="coinbase_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.coinbase_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_coinbase_settings')}}" method="post">
                                <div class="form-group">
                                    <h5> {{ __('messages.coinbase_Key') }} </h5>
                                    <input type="text" name="coinbase_key" value="{{ env('COINBASE_API_KEY') }}" class="form-control"   >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.cb_wh_secret') }} </h5>
                                    <input type="text" name="coinbase_seceret" value="{{ env('COINBASE_WEBHOOK_SECRETE') }}" class="form-control" >
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="bcm_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.bc_card_ttl') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_bc_settings')}}" method="post">
                                <div class="form-group">
                                      <h5> {{ __('messages.bc_secrete') }} </h5>
                                      <input type="text" name="bc_secrete" value="{{ env('BCM_SECRETE') }}" class="form-control"   >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('messages.bc_xpub') }} </h5>
                                      <input type="text" name="bc_xpub" value="{{ env('BC_MY_XPUB') }}" class="form-control"   >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('messages.bc_api_key') }} </h5>
                                      <input type="text" name="bc_api_key" value="{{ env('BC_MY_API_KEY') }}" class="form-control" >
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
                                
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="pstack_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.paystack_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_paystack_settings')}}" method="post">
                                <div class="form-group">
                                      <h5> {{ __('messages.paystk_pub_key') }} </h5>
                                      <input type="text" name="paystack_pub_key" value="{{ env('PAYSTACK_PUBLIC_KEY') }}" class="form-control" >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('messages.paystk_sec_key') }} </h5>
                                      <input type="text" name="paystack_secret" value="{{ env('PAYSTACK_SECRET_KEY') }}" class="form-control"  >
                                </div>  
                                <div class="form-group">
                                      <h5> {{ __('messages.paystk_mer_email') }} </h5>
                                      <input type="email" name="paystack_email" value="{{ env('MERCHANT_EMAIL') }}" class="form-control"  >
                                </div>
                                <div class="form-group">
                                      <h5> {{ __('Paystack Callback URL') }}</h5>
                                      <input type="text" name="" value="{{ env('APP_URL') }}/paystack/callbck" class="form-control" readonly>
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="payeer_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.payr_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_payeer_settings')}}" method="post">
                                <div class="form-group">
                                    <h5> {{ __('messages.payr_mer_id') }} </h5>
                                    <input type="text" name="payeer_id" value="{{ env('PAYEER_MID') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.payr_secret') }} </h5>
                                    <input type="text" name="payeer_key" value="{{ env('PAYEER_KEY') }}" class="form-control">
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="rzp_switch_modal" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.payr_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_rzp_settings')}}" method="post">
                                <div class="form-group">
                                    <h5> {{ __('messages.rzp_key_id') }} </h5>
                                    <input type="text" name="rzp_id" value="{{ env('RAZOR_PAY_KEY') }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.rzp_secrete') }} </h5>
                                    <input type="text" name="rzp_secrete" value="{{ env('RAZOR_SECRETE') }}" class="form-control" required>
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="pm_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.pm_setup') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('paymentSettings.save_pm_settings')}}" method="post">
                                <div class="form-group">
                                    <h5> {{ __('messages.pm_act_id') }} </h5>
                                    <input type="text" name="pm_id" value="{{ env('PM_ACCOUNT') }}" class="form-control" placeholder="Perfect Account ID"  >
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.pm_comp_name') }} </h5>
                                    <input type="text" name="pm_name" value="{{ env('PM_COMPANY') }}" class="form-control" placeholder="Your Company Title" >
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="flutter_p_method" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.dep_with_flutter') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
            			    <form action="{{route('flutter_payment.key_save')}}" method="post">
                                <div class="form-group">
                                    <h5> {{ __('messages.flutter_key') }} </h5>
                                    <input type="text" name="flutter_key" value="{{ env('FLUTTER_P_KEY') }}" class="form-control" placeholder="Flutterwave API Key"  >
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
            
            <div id="mbc_p_wallet" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title text-primary">
            					{{ __('messages.manual_btc_wallet') }}
            				</h5>
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			<div class="modal-body">
                			    
            			    <form action="{{route('paymentSettings.save_mbc_settings')}}" method="post">
            			        <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">                                               
                                            <ul class="nav nav-pills " id="myTab" role="tablist">
                                              <!--<li class="nav-item ">-->
                                              <!--  <a class="nav-link @if(env('CRYPTO_TYPE') == 'BTC'){{__('active')}}@endif" id="wal_btc" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">BTC</a>-->
                                              <!--</li>-->
                                              <!--<li class="nav-item">-->
                                              <!--  <a class="nav-link @if(env('CRYPTO_TYPE') == 'ETH'){{__('active')}}@endif" id="wal_eth" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">ETH</a>-->
                                              <!--</li>  -->
                                              <li class="nav-item">
                                                <a class="nav-link @if(env('CRYPTO_TYPE') == 'USDT'){{__('active')}}@endif" id="wal_bch" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">USDT</a>
                                              </li>                                                     
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="crypto_type" type="text" value="{{env('CRYPTO_TYPE')}}" class="form-control cont_display_none" name="crypto_type" required placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5> {{ __('messages.enter_wallet') }} </h5>
                                    <input type="text" name="mbc_p_wallet" value="{{ env('MBC_WALLET') }}" class="form-control" placeholder="Mannula BTC wallet"  >
                                </div>
            			        <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
            			    </form>
            			</div>
            		</div>
            	</div>
            </div>
@endSection