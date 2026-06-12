@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.pystack_pymt'))
                @php($page_info = __('messages.paystack_desc'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">                   
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.dpt_u_pystack') }}</h5>
                                        </div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row"> 
                                         
                                        <div class="col-md-7">
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post" id="" role="form" action="{{ route('paystack.post_amt') }}" >
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                                    <input type="hidden" name="orderID" value="{{ $user->username.strtotime(date('Y-m-s H:i:s')) }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['Username' => $user->username]) }}" > 
                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                                            <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input id="amount" type="number" class="form-control" name="amount" value="" required autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('messages.pay_now') }}
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-5 " align="center">
                                            <br>
                                            <img src="/img/paystack.png" height="50px" /> 
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

@endSection
            