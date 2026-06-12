
@if($bank->Bank_Name == 'BTC' || $bank->Bank_Name == 'ETH' || $bank->Bank_Name == 'USDT')
    <!-- /////////////////   edit BTC wallet modal /////////////////////////////////////////////// -->
    <div class="modal fade modal_bg_color" id="edit_bank_modal_{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLongTitle">{{ __('messages.edit_acct') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" method="post" action="/user/edit/bank/crypto">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">                                               
                            <ul class="nav nav-pills " id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link " id="wal_btc" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">BTC</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link " id="wal_eth" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">ETH</a>
                              </li>  
                              <li class="nav-item">
                                <a class="nav-link " id="wal_bch" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">BCH</a>
                              </li>                                                     
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ __('messages.walt') }}</label> 
                            <input type="hidden" name="act_id" value="{{ $bank->id }}">
                            <input type="text" class="form-control" name="actNo" value="{{ $bank->Account_number }}" required placeholder="Wallet">
                            <input id="crypto_type" type="hidden" value="{{$bank->Bank_Name}}" class="form-control" name="bname" required placeholder="">
                        </div>
                    </div>
                </div>           
    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="collcc btn btn-info">{{ __('messages.sv_chng') }}</button>
                        </div>
                    </div>
                </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>
@elseif($bank->Bank_Name == 'Paypal')
    <!-- /////////////////   edit Paypal modal /////////////////////////////////////////////// -->
    <div class="modal fade modal_bg_color" id="edit_bank_modal_{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLongTitle">{{ __('messages.edit_acct') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" method="post" action="/user/edit/bank/paypal">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ __('messages.add_paypal_act2') }}</label>    
                            <input type="hidden" name="act_id" value="{{ $bank->id }}">
                            <input type="email" class="form-control" name="actNo" value="{{$bank->Account_number}}" required placeholder="{{ __('messages.user_login_frm_email') }}">
                            <input type="hidden" value="Paypal" class="form-control" name="bname" required placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{ __('messages.act_nam') }}</label>                        
                            <input type="text" class="form-control" name="act_name" value="{{$bank->Account_name}}" required placeholder="{{ __('messages.act_nam') }}">
                        </div>
                    </div>
                </div>           
    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="collcc btn btn-info">{{ __('messages.sv_chng') }}</button>
                        </div>
                    </div>
                </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>
@else
    <div class="modal fade modal_bg_color" id="edit_bank_modal_{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLongTitle">{{ __('messages.edit_bnk_account') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" method="post" action="/user/edit/bank/account">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('messages.bnk_nam') }}</label>
                            <input type="hidden" name="act_id" value="{{ $bank->id }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" class="form-control" name="bname" value="{{$bank->Bank_Name}}" required placeholder="{{ __('messages.bnk_nam') }}">
                        </div>
                    </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('messages.act_nam') }}</label>
                            <input type="text" class="form-control" name="act_name" value="{{$bank->Account_name}}" required placeholder="{{ __('messages.act_nam') }}">
                        </div>
                    </div>    
                  
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('messages.act_numb') }}</label>
                            <input type="text" class="form-control" name="actNo"  value="{{$bank->Account_number}}" required placeholder="{{ __('messages.act_numb') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('messages.swt_nam') }}</label>
                            <input type="text" class="form-control" name="swift_num" required placeholder="{{ __('messages.swt_nam') }}">
                        </div>
                    </div> 
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="collcc btn btn-info">{{ __('messages.sv_chng') }}</button>
                        </div>
                    </div>
                </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>
@endif