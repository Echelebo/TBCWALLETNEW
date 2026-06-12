@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
    <div class="main-panel">
        <div class="content">
            @php($breadcome = __('messages.dep_with_flutter'))
            @php($page_info = __('messages.dep_with_flutter_desc'))
            @include('user.atlantis.main_bar2')
            <div class="page-inner mt--5 bg-white">                   
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title text-primary">
                                        <img src="/img/flutterwave.png" height="50px" />
                                    </div>
                                    <div class="card-tools">                                            
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">                                      
                                    <div class="col-md-7">
                                        <div class="panel-body">
                                            <div class="col-sm-12 p-0">
                                                <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                                <div>1 USD = {{env('CONVERSION')}}</div>
                                            </div>
                                            <input id="wd_amt" type="number" class="form-control mt-2" name="amount" value="" />
                                            <button class="btn btn-primary mt-4" type="submit" id="flw_pay_btn">Pay Now</button>
                                            <form id="flw_form" method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                                                <!--<label>{{__('messages.enter_amt')}}</label>-->
                                                <input type="hidden" name="public_key" value="{{env('FLUTTER_P_KEY')}}" />
                                                <input type="hidden" name="customer[email]" value="{{$user->email}}" />
                                                <input type="hidden" name="customer[name]" value="{{$user->username}}" />
                                                <input type="hidden" name="tx_ref" value="{{strtotime(date('Y-m-d'))}}" />
                                                <input id="flw_amt" type="hidden" class="form-control mt-2" name="amount" value="" />
                                                <input type="hidden" name="currency" value="USD" />
                                                <input type="hidden" name="meta[token]" value="{{strtotime(date('Y-m-d'))}}" />
                                                <input id="redirect_url" type="hidden" name="redirect_url" value="" />
                                                <button class="btn btn-primary mt-4 cont_display_none" type="submit" id="start-payment-button">Pay Now</button>
                                            </form>
                                            <script>
                                                $('#flw_pay_btn').on('click', function(){
                                                    var pa_amt = $('#wd_amt').val();
                                                    if(pa_amt == '')
                                                    {
                                                        alert('Enter valid amount');
                                                    }
                                                    else
                                                    {
                                                        
                                                        $('#flw_amt').val(pa_amt);
                                                        $('#redirect_url').val("{{route('flutter_payment.suc')}}"+"?user_id={{$user->id}}"+"&amt="+pa_amt);
                                                        $('#flw_form').submit();
                                                    }
                                                })
                                            </script>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
@endSection
            