                
<div class="alert alert-info inv_alert_cont" >
    <div class="row ">
        <div class="col mt-2" align="left" >
            <h4 class="u_case"> {{$in->package}}</h4>                      
        </div>
        <div class="col-xs-2 mt-2" align="right" >
            <span class=""> <i>{{$in->status}}</i></span>                     
        </div>
        <hr>  
    </div> 
    <div class="row color_blue_9">
        <div class="col">
            {{ __('messages.cap_short') }} <span class="text-right">{{($settings->currency)}} {{$in->capital}}</span>
        </div>
        <div class="col" align="right">
            {{ __('messages.Ret_short') }} {{($settings->currency)}} {{$in->i_return}}
        </div>
    </div> 
    <!-- <div class="row" style="">
        <div class="col">
            {{ __('messages.ivt_return') }}
        </div>
        <div class="col" align="right">
            {{($settings->currency)}} {{$in->i_return}}
        </div>
    </div>   -->
    <div class="row" style="">
        <div class="col">
            {{ __('messages.ivt_started') }}
        </div>
        <div class="col" align="right">
            {{$in->date_invested}}
        </div>
    </div> 
    <div class="row" style="">
        <div class="col">
            {{ __('messages.ivt_ending') }}
        </div>
        <div class="col" align="right">
            {{$in->end_date}}
        </div>
    </div>
    <div class="row" style="">
        <div class="col">
            {{ __('messages.ivt_days') }}
        </div>
        <div class="col" align="right">
            {{$totalDays}}
        </div>
    </div>
    <!-- <div class="row" style="">
        <div class="col">
           {{ __('messages.ivt_wdrn') .': '}} 
        </div>
        <div class="col" align="right">
            {{($settings->currency)}} {{$in->w_amt}}
        </div>
    </div> 
    <div class="row" style="">
        <div class="col">
            {{ __('messages.sts') .': '}}
        </div>
        <div class="col" align="right">
            {{$in->status}}
        </div>
    </div>  -->
    <div class="row" style="" align="">
        <div class="col-sm-12 mt-3" align="center">
            <a title="Withdraw" href="javascript:void(0)" class="btn btn-info width_100per" onclick="wd('pack', '{{$in->id}}', '{{$ern}}', '{{$withdrawable}}', '{{$Edays}}', '{{$ended}}')">
                {{$settings->currency}} {{$ern}}
            </a>
        </div>
    </div>
    <!-- <div class="row " align="center">
        <div class="col-sm-12">{{ __('messages.clk_wdr') }}  </div>  
    </div>    -->                                                           
</div>
        
