@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.wthdrwl'))
                @php($page_info = __('messages.wd_info'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card no_box_shadow">
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
                                            
                                            <div class="row flex-sm-row-reverse">
                                                <div class="col-sm-6 col-sm-push-6">
                                                   @include('user.atlantis.wd_overview')
                                                </div>
                                                <div class="col-sm-6 col-sm-pull-6">
                                                    <div class="card  card-body">
                                                        <div class="text-primary pl-2">
                                                            <h5>{{ __('messages.sel_wd_mth') }}</h5>
                                                        </div>
                                                        <hr>
                                                        
                                                        <br>
                                                        <form id="wd_form_page" action="" method="post">
                                                            <div class="form-group" align="left">                       
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                <input id="wd_switch" type="hidden" name="wd_switch" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ __('messages.enter_amt') }} ({{$settings->currency}})</label>
                                                                <input id="wd_amt" type="text" class="form-control" name="amt"  required placeholder="{{ __('messages.enter_amt') }}" >
                                                            </div>
                                                            <div class="form-group">                  
                                                                    <label>{{ __('messages.sel_wd_acct')}}</label>
                                                                    <select name="bank" class="form-control" required>
                                                                        <option selected disabled>Select account</option>
                                                                        <?php 
                                                                          $banks = App\Models\banks::where('user_id', $user->id)->get();
                                                                        ?>
                                                                        @if(count($banks) > 0)
                                                                            @foreach($banks as $bank)
                                                                                <option>{{$bank->Account_name.' '.$bank->Account_number.' '.$bank->Bank_Name}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                            </div>
                                                            <div class="row pr-4 pl-4">
                                                                <div class="col p-1">
                                                                    <div id="wd_sel_wall" class="border p-3 p_method_sel " align="center" onclick="wd_sel_mth(this.id, '/user/wallet/wd')" >
                                                                        <i class="fa fa-wallet text-primary"> Wallet Withdrawal</i>
                                                                    </div>
                                                                </div>
                                                                <div class="col p-1">
                                                                    <div id="wd_sel_ref" class=" border p-3 p_method_sel" align="center" onclick="wd_sel_mth(this.id, '/user/ref/wd')">
                                                                        <i class="fa fa-users text-primary"> Referral Withdrawal</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <br>
                                                                <button id="wd_page_sbtn" class="collb btn btn-info d-none">{{ __('messages.wthdrw') }}</button>
                                                            </div>
                                                        </form>  
                                                        <br>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.wthdrwl_hstry') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $activities = App\Models\withdrawal::where('user_id', $user->id)->orderby('id', 'desc')->paginate(10);
                                    ?>
                                    @if(count($activities) > 0 )
                                        @foreach($activities as $activity)
                                        <div class="row border_btm p-3">
                                            <div class="col-xs d-flex justify-content-center align-items-center ">
                                                <i class="fa-solid fa-arrow-down-to-square text-primary fa-2x"></i>
                                            </div>
                                            <div class="col mt-1">
                                                <div class="row">
                                                    <div class="col col-sm-9">
                                                        <h6>{{ ucfirst($activity->package) }} </h6>                                                  
                                                    </div>
                                                    <div class="col-xs-3 col col-sm-3">
                                                        <span class="float-right text-danger">
                                                            <strong>-{{$settings->currency.$activity->amount}}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mt--2">
                                                    <div class="col col-sm-9">                                              
                                                        {{substr($activity->created_at,0,10)}}
                                                    </div>
                                                    <div class="col-xs col-sm-3 col ">
                                                        <span class="float-right ">
                                                            {{$activity->status}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mt--2">
                                                    <div class="col">
                                                        {{ $activity->account }} 
                                                    </div>
                                                </div>  
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">{{ $activities->links()}}</div>
                                        </div>
                                        @endforeach
                                    @else
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            @include('user.inc.confirm_inv')
        </form>

@endSection
            