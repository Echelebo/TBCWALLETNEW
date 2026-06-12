@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.paypal_pymt'))
                @php($page_info = __('messages.paypal_desc'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5">                   
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.dpt_u_pypal') }}</h5>
                                        </div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                            <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                        </div>
                                        <div class="col-md-7">
                                            @include('user.inc.paypal_form')
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
            