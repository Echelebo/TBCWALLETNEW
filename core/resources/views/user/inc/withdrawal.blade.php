<div id="div_withdrawal" class="container popmsgContainer" >
    <div class="row wd_row_pad" >
      <div class="col-md-4">&emps;</div>
      <div class="col-md-4 card popmsg-mobile pop_invest_col">        
        <div class="card-header" style="">
          <h4 class="text-primary"> {{ __('messages.wthdrwl') }} </h4>
        </div>
        <div class="card-body " > 
            <div class="d-flex flex-row justify-content-start align-items-center">
                <div>{{ __('messages.total_ern').__(' ') }} {{$settings->currency}} <span class="text-danger" id="earned"></span></div> 
                <div class="with_25per"></div>
                <div>Days: <span id="days" class="text-danger" ></span></div> 
            </div>
          <form id="wd_formssss" action="/user/wdraw/earning" method="post">
              <div class="form-group" align="left">                       
                  <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                  <input id="inv_id" type="hidden" class="form-control" name="p_id" value="">
                  <input id="ended" type="hidden" class="form-control" name="ended" value="">
              </div>
              <div align="left">
                <label>{{ __('messages.wthdrbl_amnt') }} </label>
              </div>
              <div class="input-group">                
                <div class="input-group-prepend " >
                  <span class="input-group-text " >{{$settings->currency}}</span>
                </div>                                     
                <input id="withdrawable_amt" type="text" value="" readonly class="bg_white form-control" name="amt"  required >
              </div>
              <div class="form-group" align="center">
                <br><br>
                  <button class="btn btn-info"> {{ __('messages.wthdrw') }} </button>
                  <span style="">            
                    <a id="div_withdrawal_close" href="javascript:void(0)" class="btn btn-danger"> {{ __('messages.cncl') }} </a>        
                  </span>
                  <br>
              </div>
          </form>
        </div>
        <!-- close btn -->
        <script type="text/javascript">
          $('#div_withdrawal_close').click( function(){
            $('#div_withdrawal').hide();
          });        
        </script>
        <!-- end close btn -->
      </div>

    </div>
  </div>