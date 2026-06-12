@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')


    <div class="main-panel">
        <div class="content">
            @php($breadcome = __('messages.cb_paymt'))
            @php($page_info = __('messages.coinbase_desc'))
            @include('user.atlantis.main_bar2')
            <div class="page-inner mt--5">                   
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title text-primary">
                                        <h5>{{ __('messages.dpt_u_cb') }}</h5>
                                    </div>
                                    <div class="card-tools">                                            
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(!Session::has('coinbase_charge'))
                                    <div class="row">  
                                        <div class="col-md-7">
                                            <div class="panel-body">

                                                <form class="form-horizontal" method="POST" role="form" action="{!! URL::route('coinbase.paybtcamt') !!}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                                            <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input id="amount" type="number" class="form-control" name="amount" required autofocus> 
                                                            </div>
                                                            @if (Session::has('err'))
                                                                <span class="help-block text-danger">
                                                                    <strong>{{ Session::get('err') }}</strong>
                                                                </span>
                                                            @endif
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
                                        <div class="col-md-5" align="center"><br>
                                            <i class="fab fa-bitcoin fa-4x text-info"></i>
                                        </div>
                                    </div>
                                @endif
                                @if(Session::has('coinbase_charge'))
                                    @php($coinbase_charge = Session::get('coinbase_charge'))
                                    <div class="row">  
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                    <label for="amount" class="col-md-4 control-label">{{ __('messages.cb_dpt_trans') }}</label>
                                                    <div class="col-md-12 text-center border p-3 bg_grey">
                                                        <div class="h4">
                                                            <b><i class="fab fa-bitcoin"></i>{{ __('messages.btc') }}:</b> {{$coinbase_charge['pricing']['bitcoin']['amount']}} 
                                                        </div>                                                       
                                                        <b>{{ __('messages.adr') }}:</b> {{$coinbase_charge['addresses']['bitcoin']}} 
                                                    </div>
                                                   
                                                    <div>
                                                        <p class="text-danger">
                                                            {{ __('messages.cb_chrg_info') }}                                                            
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" align="center"><br>
                                            <i class="fab fa-bitcoin fa-4x text-info"></i>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <a href="/{{$user->username}}/wallet" class="btn btn-primary">
                                                    {{ __('messages.bck') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>

        @include('user.inc.confirm_inv')

@endSection
            