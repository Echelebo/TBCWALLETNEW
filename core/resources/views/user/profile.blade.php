@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.my_prfl'))
                @php($page_info = __('messages.manage_prf'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-sm-12 card no_box_shadow">                        
                          <ul class="nav nav-tab  mt-5 pl-3" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link custom-tab active " id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link custom-tab" id="bank-tab" data-toggle="pill" href="#bank" role="tab" aria-controls="bank" aria-selected="false">Account</a>
                            </li>                            
                            <li class="nav-item">
                              <a class="nav-link custom-tab" id="kyc-tab" data-toggle="pill" href="#kyc" role="tab" aria-controls="kyc" aria-selected="false">KYC</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link custom-tab" id="sec-tab" data-toggle="pill" href="#sec" role="tab" aria-controls="sec" aria-selected="false">Security</a>
                            </li>                                                        
                          </ul>

                          <div class="tab-content mt-4" id="pills-tabContent">
                            <!-- profile panel -->
                            <div class="p-2 tab-pane fade show active" id="profile" role="tabpanel" >
                              <div class=" row form-group">                                                                  
                                <div class="col-md-4">
                                  <div class="">
                                      <div class="card-header">
                                         <div class="card-head-row">
                                            <div class="card-title text-primary">
                                                  <h5>{{ __('messages.avatr') }}</h5>
                                            </div>
                                            <div class="card-tools">                                            
                                            </div>
                                          </div>
                                      </div>
                                      <div class="card-body">
                                          <div class="chart-container">
                                              <div class="comment-phara">
                                                  <div class="comment-adminpr" align="center">
                                                      <a id="selectPic" href="javascript:void(0)"  >
                                                          @if($user->img == "")
                                                              <img class="avatar_img" src="/img/any.png">
                                                          @else
                                                              <img class="avatar_img" src="/img/profile/{{ $user->img }}">
                                                          @endif
                                                      </a> 

                                                      <form id="form_profilepic" action="/user/upload/profile_pic" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                          <input type="file" name="prPic" id="prPic" class="display_not">
                                                      </form>
                                                  </div>
                                                  <br>
                                                  
                                              </div>
                                              <div class="admin-comment-month" align="left" style="font-size: 16px;">
                                                  
                                                  <div align="center"><b> {{ucfirst($user->firstname).' '.ucfirst($user->lastname)}} </b></div>
                                                  <hr>

                                                  <?php
                                                      $country = App\Models\country::find($user->country);
                                                      $state = App\Models\states::find($user->state);
                                                  ?>

                                                  <div align="center" style="">
                                                      <b>Referral link:</b><br>
                                                      <div style="color: #c60; font-size: 13px; word-wrap: break-word;">
                                                          {{env('APP_URL').__('/register/').$user->username}}
                                                      </div>
                                                      <br>                                               
                                                  </div>
                                                                                 
                                              </div>
                                          </div>                                    
                                      </div>
                                  </div>                                  
                                </div>

                                <div class="col-md-8">                            
                                  <div class="">
                                      <div class="card-header">
                                          <div class="card-head-row">
                                                <div class="card-title text-primary">
                                                  <h5>{{ __('messages.prfl_sett') }}</h5>
                                                </div>
                                                <div class="card-tools">                                            
                                                </div>
                                          </div>
                                      </div>
                                      <div class="card-body pb-0">
                                          <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                            
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>{{ __('messages.first_name') }}</label>
                                                          <input type="text" value="{{ucfirst($user->firstname)}}" class="form-control" name="fname" readonly>
                                                      </div>
                                                  </div>  
                                                  <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>{{ __('messages.lst_nam') }}</label>
                                                          <input type="text" value="{{ucfirst($user->lastname)}}" class="form-control" name="lname" readonly>
                                                      </div>
                                                  </div>                               
                                                  
                                              </div>

                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>{{ __('messages.user_login_frm_email') }}</label>
                                                          <div class="input-group">                                                       
                                                              <input id="email" type="email" value="{{$user->email}}" class="form-control" name="email" readonly>
                                                          </div>
                                                          
                                                      </div>
                                                  </div>     

                                                  <div class="col-lg-6">
                                                      <div class="form-group">
                                                          <label>{{ __('messages.username') }}</label>
                                                          <div class="input-group">                                                       
                                                              <input id="usn" type="text" value="{{$user->username}}" class="form-control" name="usn" readonly>
                                                          </div>
                                                          
                                                      </div>
                                                  </div>                                             
                                                  
                                              </div>   

                                              <form class="" method="post" action="/user/update/profile">
                                                  
                                                  <div class="row">
                                                      <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                              <label>{{ __('messages.cntry') }}</label>
                                                              <select id="country" class="form-control" name="country" >
                                                                  <?php 
                                                                      $country = App\Models\country::orderby('name', 'asc')->get();
                                                                      $phn_code = "";
                                                                  ?>
                                                                  @foreach($country as $c)
                                                                          @if($c->id == $user->country)
                                                                              @php($cs = $c->id)
                                                                              @php($phn_code = $c->phonecode)
                                                                              {{'selected'}}
                                                                              <option selected  value="{{$c->id}}">{{$c->name}}</option>
                                                                          @else
                                                                              <option value="{{$c->id}}">{{$c->name}}</option>
                                                                          @endif
                                                                  @endforeach
                                                                  @if(!isset($cs))
                                                                          <option selected disabled>{{ __('messages.select_country') }}</option>
                                                                  @endif

                                                              </select>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-6">
                                                           <div class="form-group">
                                                              <label>{{ __('messages.state_prvc') }}</label>
                                                              <select  id="states" class="form-control" name="state" required>
                                                                  @if(isset($cs))
                                                                       <?php 
                                                                          $st = App\Models\states::where('id', $user->state)->get();
                                                                      ?>
                                                                      @if(count($st) > 0)
                                                                          <option selected value="{{$st[0]->id}}">{{$st[0]->name}}</option>
                                                                      @else
                                                                          <option selected disabled>{{ __('messages.select_state') }}</option>
                                                                      @endif
                                                                      
                                                                  @else
                                                                     <option selected disabled>{{ __('messages.select_state') }}</option>
                                                                  @endif                                                           
                                                              </select>                                                        
                                                          </div>
                                                      </div>

                                                  </div>
                                                  <div class="row">
                                                      <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <label>{{ __('messages.adr') }}</label>
                                                              <input id="adr" type="text" class="form-control" value="{{$user->address}}" name="adr" required>
                                                          </div>
                                                      </div>  

                                                      <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <label>{{ __('messages.phn') }}</label>
                                                              <div class="input-group">
                                                                  <div class="input-group-prepend">
                                                                      <span id="countryCode" class="input-group-text">
                                                                          @if(isset($phn_code))
                                                                              {{'+'.$phn_code}}
                                                                          @else
                                                                              
                                                                          @endif
                                                                      </span>
                                                                  </div>                                                            
                                                                  <input id="cCode" type="hidden" class="form-control" name="cCode" required>
                                                                  <input id="phone" type="text" class="form-control" value="{{str_replace('+'.$phn_code,'',$user->phone)}}" name="phone" required>
                                                              </div>
                                                              
                                                          </div>
                                                      </div>  
                                                  </div>   
                                                  <div class="row">
                                                      <div class="col-lg-12">
                                                          <div class="form-group">
                                                              <button  class="collcc btn btn-info">{{ __('messages.updt_prfl') }}</button>
                                                          </div>
                                                      </div>                                                
                                                      
                                                  </div>
                                              </form>
                                          </div>                                
                                      </div>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <!-- end of profile panel -->

                            <!-- Banks panel -->

                            <div class="p-2 tab-pane fade " id="bank" role="tabpanel" >
                              <div class="row form-group">                                
                                <div class="col-sm-12">
                                  <div class="">
                                    <div class="card-header">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.my_accts') }}</h5>
                                        </div>
                                        <span class="float-right mt--5"> 
                                            <a class="btn dropdown-toggle text-primary" data-toggle="dropdown" href="#">
                                                <i class="fa fa-plus"></i> {{ __('messages.add_accts') }}
                                            </a>
                                            <ul class="dropdown-menu pr-2 pl-2">
                                                <li class="mt-1">
                                                  <a href="#" data-toggle="modal" data-target="#add_bank_act">
                                                    {{ __('messages.bank_account22') }}
                                                  </a>
                                                </li>
                                                <li class="mt-1">
                                                  <a href="#" data-toggle="modal" data-target="#add_btc_modal">
                                                    {{ __('messages.crypto_wallet') }}
                                                  </a>
                                                </li>
                                                <li class="mt-1">
                                                  <a href="#" data-toggle="modal" data-target="#add_paypal_modal">
                                                    {{ __('messages.paypal_text') }}
                                                  </a>
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="card-body pb-0 table-responsive text-nowrap" >
                                      @if(count($mybanks) > 0)
                                        @foreach($mybanks as $bank)
                                          <div class="row border_btm p-3 mt-2 text-nowrap">
                                            <div class="col-xs-2 d-flex justify-content-center align-items-center ">
                                              @if($bank->Bank_Name == 'BTC' || $bank->Bank_Name == 'ETH' || $bank->Bank_Name == 'USDT')
                                                <i class="fad fa-coin fa-2x text-primary"></i>
                                              @elseif($bank->Bank_Name == 'Paypal')
                                                <i class="fa-brands fa-paypal fa-2x text-primary"></i>
                                              @else
                                                <i class="fa fa-bank fa-2x text-primary"></i>
                                              @endif
                                            </div>
                                            <div class="col">
                                              <div class="row">
                                                  
                                                    @if($bank->Bank_Name == 'BTC' || $bank->Bank_Name == 'ETH' || $bank->Bank_Name == 'USDT')
                                                        <div class="col col-xs-12 text-nowrap">
                                                          <h6>{{__('messages.coin_nam') }} </h6>  
                                                          <p class="mt--2">{{ $bank->Bank_Name }} </p>
                                                        </div>
                                                        <div class="col col-xs-12 text-nowrap">
                                                            <h6>{{__('messages.wallet_adr')}}</h6>  
                                                            <p class="mt--2">
                                                                    {{ $bank->Account_number }}
                                                            </p>
                                                        </div>
                                                        <div class="col text-nowrap">
                                                            <h6 class="text-nowrap"></h6>
                                                            <p class="mt--2">
                                                            </p> 
                                                        </div>
                                                    @elseif($bank->Bank_Name == 'Paypal')
                                                        <div class="col col-xs-12 text-nowrap">
                                                          <h6>{{ $bank->Bank_Name }} </h6>  
                                                          <p class="mt--2">{{ $bank->Account_number }} </p>
                                                        </div>
                                                        <div class="col col-xs-12 text-nowrap">
                                                            <h6>{{__('messages.act_nam')}}</h6>  
                                                            <p class="mt--2">
                                                                @if($bank->Account_name != 'N')
                                                                    {{ $bank->Account_name }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col text-nowrap">
                                                            <h6 class="text-nowrap"></h6>
                                                            <p class="mt--2">
                                                                
                                                            </p> 
                                                        </div>
                                                    @else
                                                        <div class="col col-xs-12 text-nowrap">
                                                          <h6>{{ $bank->Bank_Name }} </h6>  
                                                          <p class="mt--2">{{ $bank->Account_number }} </p>
                                                        </div>
                                                        <div class="col col-xs-12 text-nowrap">
                                                            <h6>{{__('messages.act_nam')}}</h6>  
                                                            <p class="mt--2">
                                                                @if($bank->Account_name != 'N')
                                                                    {{ $bank->Account_name }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col text-nowrap">
                                                            <h6 class="text-nowrap">{{__('messages.swt_nam')}}</h6>
                                                            <p class="mt--2">
                                                                @if($bank->Swift_number != 'N')
                                                                    {{ $bank->Swift_number }}
                                                                @endif
                                                            </p> 
                                                        </div>
                                                    @endif
                                              </div>
                                            </div>                                                                  
                                            <div class="col-xs-2 d-flex justify-content-center align-items-center ">
                                                <a class="btn text-primary" data-toggle="dropdown" href="#">
                                                    <i class="fa-solid fa-circle-ellipsis fa-2x text-primary"></i> 
                                                </a>
                                                <ul class="dropdown-menu pr-2 pl-2">
                                                    <li class="mt-1">
                                                        <a class="text-info" href="#" data-toggle="modal" data-target="#edit_bank_modal_{{$bank->id}}">
                                                            &emsp;<i class="fa fa-pen "></i> {{ __('messages.edit_bank') }}
                                                        </a>
                                                    </li>
                                                    <li class="mt-1">
                                                        <a class="text-danger" href="/user/remove/bankaccount/{{$bank->id}}" title="Remove">
                                                            &emsp;<i class="fa fa-times "></i> {{ __('messages.del_bank') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                          </div> 
                                          @include('user.inc.edit_acct')
                                        @endforeach
                                      @endif                                      
                                      <br><br>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- End of bank Panel -->

                            <!-- KYC -->
                            <div class="p-2 tab-pane fade " id="kyc" role="tabpanel" >
                              @if(count($kyc) > 0 && $kyc[0]->status == 0)
                                <div class="col-sm-6">
                                  <div class="">
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title">
                                                <h5>{{ __('messages.vry_status') }}</h5>
                                            </div>
                                            <div class="card-tools">                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-warning">
                                          {{ __('messages.vry_status2') }}
                                        </div>                                  
                                    </div>
                                  </div>
                                </div>
                              @elseif(count($kyc) > 0 && $kyc[0]->status == 1)
                                <div class="col-sm-6">
                                  <div class="">
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title">
                                                <h5>{{ __('messages.vry_status') }}</h5>
                                            </div>
                                            <div class="card-tools">                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-success">
                                          {{ __('messages.vry_suc') }}
                                        </div>                                  
                                    </div>
                                  </div>
                                </div>
                              @elseif(count($kyc) == 0)
                                <form id="id_verify" class="" method="post" action="{{ route('kyc.kyc_upload') }}" enctype="multipart/form-data">
                                  <div class="row form-group">
                                    <div class="col-sm-6">
                                      <div class="">
                                        <div class="card-header">
                                            <div class="card-title text-primary">
                                                <h5>{{ __('messages.kyc_lvl_upgrade') }}</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                          <div class="row">
                                            <div class="col-lg-12">
                                              <div id="selfie" class="">
                                                <div class="form-group" align="center">                                              
                                                  
                                                  <p class="text_grey2 " align="center">
                                                    {{ __('messages.take_selfie') }}
                                                  </p>
                                                  <img src="/img/any.png" class="" align="center">
                                                  <input type="file" class="form-control upload_inp mt-2" name="selfie" required>
                                                </div>                                                
                                              </div>
                                                                                          
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div> 

                                    <div class="col-sm-6">
                                      <div class=" pb-5 ">
                                          <div class="card-header">
                                                <div class="card-title text-primary">
                                                    <h5>{{ __('messages.id_vry') }}</h5>
                                                </div>
                                          </div>
                                          <div class="card-body pb-2">
                                              <div class="form-group">                                                
                                                <p>
                                                  {{ __('messages.vry_valid_id') }}
                                                </p> 
                                              </div>
                                              <div class="form-group mt-4">                                              
                                                <label>Card Type</label>                                                  
                                                <select id="card_select" name="cardtype" class="form-control" required="required">
                                                  <option selected disabled > {{ __('messages.Sel_id_type') }}</option>
                                                  <option value="idcard_op">{{ __('messages.country_state_id') }}</option>
                                                  <option value="passport_op">{{ __('messages.int_passport') }}</option>
                                                  <option value="driver_op">{{ __('messages.driver_lic') }}</option>
                                                </select>
                                              </div>
                                              
                                              <div id="card_cont" class="cont_display_none">
                                                <div class="form-group mt-3">                                              
                                                  <label>{{ __('messages.upload_card_front') }}</label> 
                                                  <br>
                                                  <img src="/img/id_temp_front.png" class="img_card_temp" width="100%">                                                 
                                                  <input type="file" class="form-control upload_inp mt-2" name="id_front" >
                                                </div>

                                                
                                                <div class="form-group mt-3">                                              
                                                  <label>{{ __('messages.upload_card_back') }}</label>
                                                  <br>
                                                  <img src="/img/id_tem_bac.png" class="img_card_temp" width="100%">                                                   
                                                  <input type="file" class="form-control mt-2" name="id_back" >
                                                </div>
                                              </div>
                                              
                                              <div id="pass_cont" class="cont_display_none">
                                                <div class="form-group">                                              
                                                  <label>{{ __('messages.upload_pass_fr') }}</label> 
                                                  <br>
                                                  <img src="/img/id_temp_front.png" class="img_card_temp" width="100%">                                                  
                                                  <input type="file" class="form-control upload_inp mt-2" name="pas_id_front" >
                                                </div>                                                
                                              </div>
                                          </div>
                                      </div>
                                      <div class="">
                                        <div class="card-header">
                                            <div class="card-title text-primary">
                                                <h5>{{ __('messages.proof_of_adr') }}</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="row">
                                              <div class="col-lg-12">
                                                
                                                  <div class="form-group">
                                                    <h3></h3> 
                                                    <p>
                                                      {{ __('messages.poa_doc') }}
                                                    </p>                                                   
                                                    <input type="file" class="form-control" name="utility_doc" required >
                                                  </div>

                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                          
                                    </div> 

                                    <div class="col-sm-12 mt-5">
                                      <div class="form-group">
                                        <button class="collcc btn btn-info float-right">{{ __('messages.upld') }}</button>
                                      </div>
                                    </div>

                                  </div>
                                </form>
                              @endif
                            </div>
                            <!-- End of KYC -->


                            <!-- Security -->
                            <div class="p-2 tab-pane fade " id="sec" role="tabpanel" >
                              <div class="row form-group">
                                <div class="col-sm-6">
                                  <div class="">
                                    <div class="card-header">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.2fa_sec') }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="row">
                                          <div id="sec_enable_div" class="col-lg-12">
                                            <div class="form-group ">
                                              <div>
                                                <label>{{ __('messages.enable_disable') }}</label>
                                              </div>
                                                
                                              <div class="btn-group btn-group-toggle btn-lg p-0 ">
                                                <label class="btn @if($user->sec_2fa_status == 1){{__('btn-success text-white')}}@else{{__('btn_grey')}}@endif" onclick="s_2fa('enable')">
                                                  <input type="radio" name="options" autocomplete="off" >{{ __('messages.enbl') }} 
                                                </label>                                                    
                                                <label class="btn @if($user->sec_2fa_status == 1){{__('btn_grey')}}@else{{__('btn-success text-white')}}@endif" onclick="s_2fa('disable')">
                                                  <input type="radio" name="options" autocomplete="off" >{{ __('messages.disbl') }}
                                                </label>
                                              </div>
                                              <div class="width_100per ">
                                                <small class=" mt-5">
                                                  {{__('messages.curnt_stat')}} @if($user->sec_2fa_status == 1){{__('messages.enbl')}}@else{{__('messages.disbl')}}@endif
                                                </small>
                                              </div>
                                                  
                                            </div>
                                          </div>

                                          <div class="col-sm-12">
                                            <div id="google_2fa_cont" class="cont_display_none ">
                                              <div class="card-header">
                                                    <div class="card-title">
                                                        <h5>{{ __('messages.qr_code') }}</h5>
                                                    </div>
                                              </div>
                                              <div id="qrcode_2fa_div" class="card-body pb-0 table-responsive text-center" >
                                                <div class="form-group" align="center">
                                                  <div id="img_2fa" class="text-center qr_code_img"></div>                          
                                                </div>
                                                <div class="form-group">
                                                  <p>
                                                    {{ __('messages.scan_qr_code_msg') }}
                                                  </p>
                                                </div> 
                                                <form action="{{ route('user2fa.verify_2fa') }}" method="post">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="fa_code" required placeholder="6-digit OTP">
                                                    <input id="seccode" type="hidden" class="form-control" value="" name="seccode" required placeholder="">
                                                  </div>
                                                  <div class="form-group">
                                                    <button  class="collcc btn btn-info">{{ __('messages.qr_code_sts') }}</button>
                                                  </div>
                                                </form>                                        
                                                <br>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-sm-12">
                                            <div id="google_2fa_disable" class="cont_display_none ">
                                              <div class="card-header">
                                                  <div class="card-title">{{ __('messages.vfy_otp') }}</div>
                                              </div>
                                              <div id="qrcode_2fa_div" class="card-body pb-0 table-responsive text-center" >
                                                <div class="form-group">
                                                  <p>
                                                    {{ __('messages.enter_gle_otp') }}
                                                  </p>
                                                </div> 
                                                <form action="{{ route('user2fa.disable_2fa') }}" method="post">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="fa_otp" required placeholder="6-digit OTP">
                                                  </div>
                                                  <div class="form-group">
                                                    <button class="collcc btn btn-info">{{ __('messages.disbl') }}</button>
                                                  </div>
                                                </form>                                        
                                                <br>
                                              </div>
                                            </div>
                                          </div>
                                         
                                      </div>
                                        
                                    </div>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="">
                                    <div class="card-header">
                                        <div class="card-head-row">
                                            <div class="card-title text-primary">
                                                <h5>{{ __('messages.chng_pwd') }}</h5>
                                            </div>
                                            <div class="card-tools">                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form class="" method="post" action="/user/change/pwd">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group">
                                                <label>{{ __('messages.old_pwd') }}</label>
                                                <input type="password" class="form-control" name="oldpwd" placeholder="Your current password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('messages.new_pwd') }}</label>
                                                <input type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('messages.confrm_pwd') }}</label>
                                                <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="form-group" align="">
                                               <button class="collcc btn btn-info">{{ __('messages.txt_updt') }}</button>
                                            </div>
                                        </form>                                    
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!-- End of Security -->
                          </div>
                      </div>

                    </div>

                </div>
            </div>
            @include('user.inc.confirm_inv')
            @include('user.inc.add_accounts')
@endSection