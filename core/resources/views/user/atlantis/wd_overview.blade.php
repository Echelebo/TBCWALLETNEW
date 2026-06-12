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




<div class="row ">
  <div class="col-md-12">
    <div class="card  full-height">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title text-primary">
                    <h5>{{ __('messages.bal') }}</h5>
                </div>
            </div>
        </div>
      <div class="card-body">
        <div class="row mt-5">
          <div class="col-md-5 ">
            <a id="wd_bal" title="Click to withdraw" href="javascript:void(0)" >
              <div class="border_btm">              
                <h5 class="text_black">{{ __('messages.walt') }}</h5>
                <p class="text_grey mt-4">{{$settings->currency}} {{ round($user->wallet, 2) }}</p>
                <br>            
              </div>
            </a>  
          </div>          
          
          <div class="col-md-5">
            <a id="wd_ref_bal" title="Click to withdraw" href="javascript:void(0)">
              <div class="border_btm">             
                <h5 class="text_black">{{ __('messages.refrrl_bns') }}</h5>
                <p class="text_grey mt-4">{{$settings->currency}} {{ round($user->ref_bal, 2) }}</p>                
                <br>                  
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
