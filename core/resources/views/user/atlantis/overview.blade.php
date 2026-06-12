<?php
  $totalEarning = 0;    
  $currentEarning = 0;
  $workingDays = 0;
     
  foreach($actInv as $inv)
  {
    if($inv->method == 1)
    {
      $totalElapse = getWorkingDays(date('y-m-d'), $inv->end_date);
    }
    else
    {
      $totalElapse = getDays(date('y-m-d'), $inv->end_date);
    }

    if($totalElapse == 0)
    {
      $lastWD = $inv->last_wd;
      $enddate = ($inv->end_date);
      
      $getDays = getDays($lastWD, $enddate);

      if($inv->method == 1)
      {
        $getDays = getWorkingDays($lastWD, $enddate);
      }
      else
      {
        $getDays = getDays($lastWD, $enddate);
      }
      $currentEarning += $getDays*$inv->interest*$inv->capital;
      
    }
    else
    {
      $sd = $inv->last_wd;
      $ed = date('Y-m-d');
      $getDays = getDays($sd, $ed);

      if($inv->method == 1)
      {
        $getDays = getWorkingDays($sd, $ed);
      }
      else
      {
        $getDays = getDays($sd, $ed);
      }
      $currentEarning += $getDays*$inv->interest*$inv->capital;
    }
  }
?>




<div class="row mt--2">
  <div class="col-md-6">
    <div class="card full-height">
      <div class="card-body">
        <div class="card-title text-primary"><h5>{{ __('messages.bal') }}</h5></div>
        <div class="row mt-5">
          <div class="col-md-4 ">
            <a title="Click to withdraw" href="javascript:void(0)" data-toggle="modal" data-target="#wallet_wd">
              <div class="border_btm">              
                <p class="text_black">{{ __('messages.walt') }}</p>
                <p class="text-primary">{{$settings->currency}} {{ round($user->wallet, 2) }}</p>
                <div class="margin_n10 text-success">{{ __('messages.clk_to_wthd_fnd') }}</div>  
                <br>            
              </div>
            </a>  
          </div>          
          <div class="col-md-4">
            <a href="#">
              <div class="border_btm">
                <p class="text_black">{{ __('messages.erng') }}</p>
                <p class="text-primary">{{$settings->currency}} {{ round($currentEarning, 2) }}</p>
                <div class="margin_n10 text-success" >&emsp;</div> 
                <br>  
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a id="wd_ref_bal" title="Click to withdraw" href="javascript:void(0)" data-toggle="modal" data-target="#ref_wd">
              <div class="border_btm">             
                <p class="text_black">{{ __('messages.refrrl_bns') }}</p>
                <p class="text-primary">{{$settings->currency}} {{ round($user->ref_bal, 2) }}</p>
                <div class="margin_n10 text-success" >{{ __('messages.clk_to_wthd_fnd') }}</div> 
                <br>                  
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card full-height">
      <div class="card-body">
        <div class="card-title"><h5 class="text-primary">{{ __('messages.ovral_stat') }}</h5></div>
        <div class="card-category"></div>
        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
          <div class="px-2 pb-2 pb-md-0 text-center">
            <div id="circles-1"></div>
            <div class=" mt-3 mb-0">{{ __('messages.investments') }}</div>
          </div>
          <div class="px-2 pb-2 pb-md-0 text-center">
            <div id="circles-2"></div>
            <div class=" mt-3 mb-0">{{ __('messages.wthdrwls') }}</div>
          </div>
          <div class="px-2 pb-2 pb-md-0 text-center">
            <div id="circles-3"></div>
            <div class=" mt-3 mb-0">{{ __('messages.dwnlns') }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="wallet_wd" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body row p-0">
        <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
	        <div class="text-white text-center">
	            <i class="fa-solid fa-circle-info fa-3x text-white"></i><br>
	            {{ __('messages.wallet_wdrl') }} 
	        </div>
	    </div>                                                           
        <div class="col-sm-8 pr-4">
            <div class=" mt-3 text-center ">
                <br>
                <h6 class=""><b>{{ __('messages.av_bal') }}</b></h6> 
                <h4 class="text-danger">
                  {{$settings->currency}} {{ round($user->wallet, 2) }}
                </h4>
            </div>
            
            <form id="wd_formssss" action="/user/wallet/wd" method="post">
                <div class="form-group" align="left">                       
                    <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input id="wd_amt" type="text" class="form-control" name="amt"  required placeholder="{{ __('messages.enter_amt') }}" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
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
                </div>
                <div class="form-group">
                  <br><br>
                    <button class="collb btn btn-info">{{ __('messages.wthdrw') }}</button>
                    <span style="">            
                      <a id="wallet_wd_close" href="javascript:void(0)" class="collcc btn btn-danger" data-dismiss="modal">{{ __('messages.cncl') }}</a>        
                    </span>
                    <br>
                </div>
            </form>
            <!--<button type="button" class="btn btn-default float-right p-5" data-dismiss="modal">Close</button>-->
        </div> 
      </div>
    </div>

  </div>
</div>

  
<div id="ref_wd" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body row p-0">
        <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
	        <div class="text-white text-center">
	            <i class="fa-solid fa-circle-info fa-3x text-white"></i><br>
	            {{ __('messages.ref_wdr') }} 
	        </div>
	    </div>                                                           
        <div class="col-sm-8 pr-4">
            <div class=" mt-3 text-center ">
                <br>
                <h6 class=""><b>{{ __('messages.total_ern') }}</b></h6> 
                <h4 class="text-danger">
                    {{$settings->currency.' '.$user->ref_bal}}   
                </h4>
            </div>
            
            <form id="wd_formssss" action="/user/ref/wd" method="post">
                <div class="form-group" align="left">                       
                    <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input id="ref_amt" type="text" class="form-control" name="amt"  required placeholder="{{ __('messages.enter_amt') }}" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
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
                </div>
                <div class="form-group">
                  <br><br>
                    <button class="collb btn btn-info">{{ __('messages.wthdrw') }}</button>
                    <span style="">            
                      <a id="wallet_wd_close" href="javascript:void(0)" class="collcc btn btn-danger" data-dismiss="modal">{{ __('messages.cncl') }}</a>        
                    </span>
                    <br>
                </div>
            </form>
            <!--<button type="button" class="btn btn-default float-right p-5" data-dismiss="modal">Close</button>-->
        </div> 
      </div>
    </div>

  </div>
</div>