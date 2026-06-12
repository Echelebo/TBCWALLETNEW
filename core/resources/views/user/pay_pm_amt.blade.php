@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.pm_paymt'))
                @php($page_info = __('messages.pm_desc'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">                   
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                             <img align="center" src="http://www.deminetsolution.biz/slides/slide4.jpg" class="img-responsive" style="height: 70px">
                                        </div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row"> 
                                        <div class="col-md-7">
                                           <div class="panel-body">
                                            <form class="form-horizontal" action="{{ route('pm.post_amt') }}" method="POST" role="form">
                                                @csrf
                                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                    <div class="">
                                                        <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label> 
                                                        <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                                    </div> 
                                                    <div class="">
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
                                                    <div class="">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('messages.pay_now') }}
                                                        </button>
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
@endSection