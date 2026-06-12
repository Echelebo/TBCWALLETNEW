@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
    <div class="main-panel">
      <div class="content">
        @php($breadcome = __('messages.snd_fnd'))
        @php($page_info = __('messages.trs_to_user'))
        @include('user.atlantis.main_bar2')
        <div class="page-inner mt--5 bg-white">          
          <div id="prnt"></div>          
          <div class="row">
            <div class="col-md-12">
              @if($settings->user_transfer == 1)
                <div class="card ">
                  <div class="card-header">
                    <div class="card-title text-primary"> 
                        <h5>{{ __('messages.fnd_trsfr') }}</h5> 
                    </div>
                  </div>
                  <div class="card-body pb-0">                 
                      @if(Session::has('err_send'))
                          <div class="alert alert-danger">
                              {{Session::get('err_send')}}
                          </div>
                          {{Session::forget('err_send')}}
                      @endif
                      <div class="row">
                        
                        <div class="col-md-4 ">                        
                            <form action="/user/send/fund" method="post" enctype="multipart/form-data">
                              <div class="form-group" align="left">                       
                                  <input type="hidden" class="regTxtBox" name="_token" value="{{csrf_token()}}">
                              </div>                                                    
                              <div class="form-group pad_top10" >
                                <label >
                                  <i class="fa fa-user"></i> {{__('messages.username')}}
                                </label>                        
                                <input type="text" class="form-control" name="usn"  required placeholder="{{__('messages.username')}}" >
                              </div>
                              <div class="form-group pt-1">
                                <label>
                                  {{__('messages.amount')}} ({{$settings->currency}})</strong> </span>
                                </label>                                                     
                                <input type="text" class="form-control" name="s_amt"  required placeholder="{{__('messages.enter_amt_tosend')}}" >
                              </div>
                                            
                              <div class="form-group" align="">
                                <br><br>
                                  <button class="btn btn_blue width_100per">{{ __('messages.send') }}</button>
                                  <br>
                              </div>                          
                            </form>  
                            <br><br>                    
                        </div>
                      </div>
                        
                  </div>
                </div>
              @else
                <div class="alert alert-danger">
                  {{__('messages.trn_fund_disble')}}
                </div>
              @endif
            </div>

            <div class="col-md-12 mt-5">
              <div class="card no_box_shadow">
                <div class="card-header">
                    <div class="card-title text-primary">
                        <h5>{{__('messages.trsfr_hstry')}}</h5> 
                    </div>
                </div>
                <div class="card-body">
                    @include('user.inc.transfer')
                </div>
              </div>
            </div>
            
          </div> 

          <div class="row">
            
          </div>        
          
        </div>
      </div>

       @include('user.inc.confirm_inv')

@endSection