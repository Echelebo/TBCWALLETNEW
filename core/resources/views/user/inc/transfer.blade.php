<?php
    $trans = App\Models\fund_transfer::where('from_usr',$user->username)->orwhere('to_usr', $user->username)->orderby('id','desc')->get();
?>
<div class="">
    @if(count($trans) > 0 )
        @foreach($trans as $activity)
            <div class="row border_btm p-3">
                <div class="col-xs d-flex justify-content-center align-items-center ">
                    <i class="fad fa-coin fa-2x text-primary"></i>
                </div>
                <div class="col mt-1">
                  <div class="row">
                    <div class="col">
                      <h6>{{ __('messages.user_trs_to') .$activity->to_usr }} </h6>                                                  
                    </div>
                    <div class="col">
                       <strong></strong>
                    </div>
                    <div class="col" align="right">
                        @if($activity->from_usr == auth()->user()->username)
                            <b class="text-danger">-{{$activity->amt}}</b>
                        @else
                            <b class="text-success">+{{$activity->amt}}</b>
                        @endif
                    </div>
                  </div>
                  <div class="row mt--2">
                    <div class="col">
                      {{$activity->created_at}}
                    </div>
                    <div class="col">
                        
                    </div>
                    <div class="col " align="right">
                      {{$activity->amt}}
                    </div>
                  </div>
                   
                </div>                                                                  
                
            </div> 

        @endforeach
    @else
        {{__('messages.no_fund_trans')}}
    @endif    
</div>
       