@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.stripe_pymt'))
                @php($page_info = __('messages.stripe_desc'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">                   
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.dpt_u_stripe') }}</h5>
                                        </div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success text-center">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                    <i class="fas fa-check-circle text-success" ></i> 
                                                    <p>{{ __('messages.suc_msg') }}</p>
                                                </div>
                                            @else
                                            <form class="form-horizontal" method="POST" role="form" action="{{ route('stripe.submitAmount') }}" >
                                                {{ csrf_field() }}

                                                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                                    <div class="">
                                                        <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                                        <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                                    </div>                          
                                                    <div class="input-group">
                                                        <input id="amount" type="number" class="form-control" name="amt" value="" required autofocus>                    
                                                    </div>
                                                </div>
                                                <div class="form-group">                                                                                                             
                                                    <button type="submit" class="btn btn-primary">{{ __('messages.pr_to_pymt') }}</button>  
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                        <div class="col-md-5" align="center">
                                            <br>
                                            <i class="fab fa-cc-stripe fa-4x text-info">                                                
                                            </i>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

             @include('user.inc.confirm_inv')

@endSection
            