@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.walt_dpst'))
                @php($page_info = __('messages.add_wallet_text'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">                    
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="text-primary">
                                        <h5>{{ __('messages.choose_pmt_mth') }}</h5>
                                    </div> 
                                </div>
                                <div class="card-body pl-4 pr-4"> 
                                        @if($user->status == 2 || $user->status == 'Blocked')
                                            <div class="alert alert-warning">
                                                <p>
                                                   {{ __('messages.act_block') }} 
                                                </p>
                                            </div>
                                        @elseif(empty($user->currency))
                                            <div class="alert alert-warning">
                                                <p>
                                                    <a href="/{{$user->username}}/profile#userdet">
                                                        {{ __('messages.act_update') }}
                                                    </a>
                                                </p>
                                            </div>
                                        @else
                                            @if($settings->deposit == 1)      
                                                <div id="pay_cont" class="row">
                                                    @if(env('SWITCH_PAYPAL') == 1)
                                                        <div id="pm_paypal" class="col-sm-4 col-6 mt-5 ">      
                                                            <a href="{{route('addmoney.paywithpaypal')}}">
                                                                <img src="/img/paypal.png" height="50px" /> <br>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if(env('SWITCH_STRIPE') == 1)
                                                    <div id="pm_stripe" class="col-sm-4 col-6 mt-5 ">
                                                        <a href="{{route('stripe.amount')}}">
                                                            <img src="/img/stripe.png" height="50px" /> <br>
                                                        </a>
                                                    </div>
                                                    @endif

                                                    @if(env('PM_SWITCH') == 1)
                                                    <div id="pm_pm"  class="col-sm-4 col-6 mt-5 ">
                                                        <a href="{{route('pm.index')}}">
                                                            <img src="/img/pm.png" height="50px" /> <br>
                                                        </a>
                                                    </div>
                                                    @endif
                                                   
                                                    @if(env('PAYEER_SWITCH') == 1)
                                                    <div id="pm_payeer" class="col-sm-4 col-6 mt-5 ">
                                                        <a href="{{route('payeer.index')}}">
                                                            <img src="/img/payeer.png" height="50px" /> <br>  
                                                        </a>
                                                    </div>
                                                    @endif

                                                    @if(env('SWITCH_BTC') == 1)
                                                    <div id="pm_btc" class="col-sm-4 col-6 mt-5 ">   
                                                        <a href="{{route('btc.index', ['coin' => 'BTC'])}}">
                                                            <img src="/img/cpm.jpg" height="50px" /> <br>  
                                                        </a>
                                                    </div>
                                                    @endif

                                                    @if(env('COINBASE_SWITCH') == 1)                                                    
                                                    <div id="pm_coinbase" class="col-sm-4 col-6 mt-5 ">   
                                                        <a href="{{route('coinbase.index')}}">
                                                            <img src="/img/cbase.png" height="50px" /> <br>
                                                        </a>
                                                    </div>
                                                    @endif


                                                    @if(env('SWITCH_ETH') == 1)
                                                    @php($lnk_pm = route('btc.index', ['coin' => 'ETH']))                                                    
                                                    <!--<div id="pm_eth" onclick="sel_pm(this.id, '{{$lnk_pm}}')" class="col-sm-4 mt-5 ">-->
                                                    <!--    <img src="/img/eth.png" height="50px" ><br>     -->
                                                    <!--</div>-->
                                                    @endif

                                                    @if(env('PAYSTACK_SWITCH') == 1)
                                                    <div id="pm_paystack" class="col-sm-4 col-6 mt-5 " >
                                                        <a href="{{route('paystack.index')}}">
                                                            <img src="/img/paystack.png" height="50px" /> 
                                                        </a> 
                                                    </div>
                                                    @endif
                                                    
                                                    @if(env('FLUTTER_SWITCH') == 1)
                                                    <div id="pm_flutter" class="col-sm-4 col-6 mt-5 " >
                                                        <a href="{{route('flutter_payment.index')}}">
                                                            <img src="/img/flutterwave.png" height="50px" width="100px" />
                                                        </a>   
                                                    </div>
                                                    @endif
                                                    
                                                    @if(env('RAZOR_PAY_SWITCH') == 1)
                                                    <div id="pm_razorpay" class="col-sm-4 col-6 mt-5 " >
                                                        <a href="{{route('rpay.rpay_amt')}}">
                                                            <img src="/img/razorpay.jpg" height="50px" width="100px" />  
                                                         </a> 
                                                    </div>
                                                    @endif
                                                    
                                                    @if(env('MBC_SWITCH') == 1)
                                                    <div id="mbc_pop_div" class="col-sm-4 col-6 mt-5  text-primary"> 
                                                        <a id='mbc_pop_btn' href="#" type="button" class="display_none" data-toggle="modal" data-target="#mbc_pop">
                                                            <img src="/img/bcimg.png" alt="Blockchain" class="text-primary payment_methods_img"/> 
                                                            <span>{{__('messages.mbc_deposit_ttl')}}</span>
                                                        </a>
                                                    </div>
                                                    <div id="mbc_pop" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
                                                      <div class="modal-dialog modal-lg">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-body row p-0">
                                                            <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
                            							        <div class="text-white text-center">
                            							            <i class="fad fa-coin fa-2x text-primary"></i><br>
                            							            {{__('messages.mbc_dep_ttl')}}
                            							        </div>
                            							    </div>                                                           
                                                            <div class="col-sm-8 pr-4">
                                                                <p class="text-danger mt-4">
                                                                    {{__('messages.mbc_dep_desc')}}
                                                                </p>
                                                                <hr>
                                                                <div class="alert alert-danger">
                                                                    <span class=" ">{{ __('messages.mbc_type') }} </span>
                                                                    <span class=" text-danger xbold"> {{env('CRYPTO_TYPE')}}</span>
                                                                </div>
                                                                <div class="mt-3 alert alert-danger"> 
                                                                    <span class="">{{ __('messages.crypto_wallet') }}</span><br>
                                                                    <span class=" text-danger">{{env('MBC_WALLET')}}</span>
                                                                </div>
                                                                
                                                                <hr>
                                                                <form method="post" action="{{route('mbc_deposit')}}" enctype="multipart/form-data">
                                                                    <input type="hidden" name="c_name" value="{{env('CRYPTO_TYPE')}}">
                                                                    <input type="hidden" name="c_wallet" value="{{env('MBC_WALLET')}}">
                                                                    <label>{{__('messages.amnt')}}</label>
                                                                    <input type="number" class="form-control" name="c_amount" value="" required>
                                                                    <label class="mt-3">{{__('messages.mbc_proof')}}</label>
                                                                    <input type="file" class="form-control" name="c_pop" required>
                                                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
                                                                </form>
                                                                <!--<button type="button" class="btn btn-default float-right p-5" data-dismiss="modal">Close</button>-->
                                                            </div> 
                                                          </div>
                                                        </div>

                                                      </div>
                                                    </div>
                                                    @endif

                                                    @if(env('BANK_DEPOSIT_SWITCH') == 1)
                                                    <div id="pm_bank_pop" class="col-sm-4 col-6 mt-5 "> 
                                                        <a id='my_bank_Modal' href="#" type="button" class="display_none" data-toggle="modal" data-target="#dp_bank_pop">
                                                            <img src="/img/bank.png" height="50px" width="80px" />
                                                        </a> 
                                                    </div>
                                                    <div id="dp_bank_pop" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
                                                      <div class="modal-dialog modal-lg">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-body row p-0">
                                                            <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
                            							        <div class="text-white text-center">
                            							            <img src="/img/bank.png" height="50px" width="80px" /><br>
                            							            {{ __('messages.bank_deposit_ttl') }} 
                            							        </div>
                            							    </div>                                                           
                                                            <div class="col-sm-8 pr-4">
                                                                <p class="text-danger mt-4">
                                                                    {{__('messages.bank_pay_info')}}
                                                                </p>
                                                                <hr>
                                                                <div class="alert alert-danger">
                                                                    <table cellspacing="15">
                                                                        <tr>
                                                                            <td>{{ __('messages.act_nam') }}</td>
                                                                            <td class="text-primary">{{env('ACCOUNT_NAME')}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ __('messages.act_numb') }}</td>
                                                                            <td class="text-primary">{{env('ACCOUNT_NUMBER')}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ __('messages.route_iban') }}</td>
                                                                            <td class="text-primary">{{env('ROUTE_IBAN_NUMBER')}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ __('messages.bnk_nam') }}</td>
                                                                            <td class="text-primary">{{env('BANK_NAME')}}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <hr>
                                                                <form method="post" action="{{route('bank_deposit')}}" enctype="multipart/form-data">
                                                                    <input type="hidden" name="b_name" value="{{env('BANK_NAME')}}">
                                                                    <input type="hidden" name="r_iban" value="{{env('ROUTE_IBAN_NUMBER')}}">
                                                                    <input type="hidden" name="act_num" value="{{env('ACCOUNT_NUMBER')}}">
                                                                    <input type="hidden" name="act_name" value="{{env('ACCOUNT_NAME')}}">
                                                                    <label>{{__('messages.amnt')}}</label>
                                                                    <input type="number" class="form-control" name="c_amount" value="" required>
                                                                    <label class="mt-3">{{__('messages.mbc_proof')}}</label>
                                                                    <input type="file" class="form-control" name="c_pop" required>
                                                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
                                                                </form>
                                                                <!--<button type="button" class="btn btn-default float-right p-5" data-dismiss="modal">Close</button>-->
                                                            </div> 
                                                          </div>
                                                        </div>

                                                      </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-lg-12">                                                                       
                                                        <div class="payment_method">
                                                            <p align="Center">
                                                               <i class="fa fa-alert"></i> {{ __('messages.dpt_disble') }} 
                                                            </p>                              
                                                        </div>                                                       
                                                    </div>
                                                </div>      
                                            @endif
                                        @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="card-title text-primary">
                                        <h5>{{ __('messages.dpst_hstr') }}</h5>
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <?php
                                        $deps = App\Models\deposits::where('user_id', $user->id)->orderby('id', 'desc')->paginate(10);
                                    ?>        
                                    @if(count($deps) > 0 )
                                        @foreach($deps as $dep)
                                          <div class="row border_btm p-3">
                                            <div class="col-xs d-flex justify-content-center align-items-center web-table">
                                                <i class="fad fa-coin fa-2x text-primary"></i>
                                            </div>
                                            <div class="col mt-1">
                                              <div class="row">
                                                <div class="col-sm-4 col">
                                                  <b>{{ __('messages.payment_via') .$dep->bank }} </b>   
                                                  <p>
                                                      {{substr($dep->created_at, 0, 10)}}
                                                  </p>
                                                </div>
                                                <!--<div class="col-sm-4">-->
                                                <!--   <b>{{__('messages.dep_account_no')}}</b>-->
                                                <!--   <p>-->
                                                <!--       {{ $dep->account_no }}-->
                                                <!--   </p>-->
                                                <!--</div>-->
                                                <div class="col-sm-4 web-table">
                                                   <b>{{__('messages.mbc_proof')}}</b>
                                                   <p>
                                                        @if($dep->url != '')
                                                            <a href="http://{{$dep->url}}" target="_blank">View pop</a>
                                                        @endif
                                                   </p>
                                                </div>
                                                <div class="col-sm-2 col-4 text-success" align="">
                                                  <b>+{{$dep->amount}}</b>
                                                  <p class="text_grey">
                                                        @if($dep->status == 0)
                                                            {{__('messages.pending')}}
                                                        @elseif($dep->status == 1)
                                                            {{__('messages.apprv')}}
                                                        @elseif($dep->status == 2)
                                                            {{__('messages.rejctd')}}
                                                        @endif
                                                  </p>
                                                </div>
                                              </div>
                                                                                           
                                            </div>   
                                          </div> 
                                        @endforeach
                                    @endif                                      
                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            @include('user.inc.confirm_inv')
            <div id="dep_pop" class="container dep_pop">
                <div class="row pad_5p2p">
                    <div class="col-md-4">&emps;</div>
                    <div class="col-md-4 pop_cont" align="Center">   
                        <div class="">                        
                            <span>            
                              <a id="dep_pop_close" href="javascript:void(0)" class="btn btn-danger">{{ __('messages.cncl') }}</a>        
                            </span>
                            <br>
                        </div>
                        <div>
                            <img id="img_pop" src="" class="pop_img_h">
                        </div>
                        <br>
                    
                        <!-- close btn -->
                        <script type="text/javascript">
                          $('#dep_pop_close').click( function(){
                            $('#dep_pop').hide();
                          });        
                        </script>
                        <!-- end close btn -->
                    </div>
                </div>
            </div>

            <div id="bank_deposit_cont_dets" class="container popmsgContainer" >
                <div class="row">
                  <div class="col-md-4">&emps;</div>
                  <div class="col-md-4 popmsg-mobile card" align="Center">        
                    <div class="mt-2 text-primary">
                      <h5>{{ __('messages.dpt_det') }}</h5>                              
                      <hr>
                    </div>
                    <div class="">                        
                        <form action="/user/wallet/bank_deposit" method="post">
                            <div class="form-group" align="left">                       
                                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg">{{$settings->currency}}</span>
                                </div>                        
                                <input type="number" class="form-control" name="amt"  required placeholder="{{ __('messages.entr_dptd') }} " >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg"><i class="fa fa-user" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="account_name"  required placeholder="{{ __('messages.act_n_dptd') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg"><i class="fa fa-home" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="account_no"  required placeholder="{{ __('messages.act_num_dptd') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend" >
                                  <span class="input-group-text span_bg"><i class="fa fa-home" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="bank_name"  required placeholder="{{ __('messages.bnk_snt_from') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <br>
                                <button class="collb btn btn-info">{{ __('messages.proc') }}</button>
                                <span style="">            
                                  <a id="bank_deposit_cont_dets_close" href="javascript:void(0)" class="collcc btn btn-danger">{{ __('messages.cncl') }}</a>        
                                </span>
                                <br>
                            </div>
                        </form>
                    </div>  
                    <!-- close btn -->
                    <script type="text/javascript">
                      $('#bank_deposit_cont_dets_close').click( function(){
                        $('#bank_deposit_cont_dets').hide();
                      });        
                    </script>
                    <!-- end close btn -->
                  </div>

                </div>
            </div>            
@endSection
            