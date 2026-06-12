
<div class="modal fade modal_bg_color" id="add_bank_act" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle text-primary">{{ __('messages.add_bnk_account') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="/user/add/bank">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>{{ __('Bank Name') }}</label>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" class="form-control" name="bname" required placeholder="Bank name">
                    </div>
                </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label>{{ __('Account Name') }}</label>
                        <input type="text" class="form-control" name="act_name" required placeholder="Account Name">
                    </div>
                </div>    
              
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>{{ __('Account Number') }}</label>
                        <input type="text" class="form-control" name="actNo"  required placeholder="Account number">
                    </div>
                </div>

                
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label>{{ __('Routing/Swift/Iban Code') }}</label>
                        <input type="text" class="form-control" name="swift_num" required placeholder="Routing/Swift/Iban Code">
                    </div>
                </div>  
                
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="collcc btn btn-info">{{ __('Add Bank') }}</button>
                    </div>
                </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- /////////////////   Add BTC wallet modal /////////////////////////////////////////////// -->

<div class="modal fade modal_bg_color" id="add_btc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle text-primary">{{ __('messages.crypto_wallet') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="/user/add/bank">
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
                            <a class="nav-link " id="wal_bch" data-toggle="pill" href="#" role="tab" aria-selected="true" onclick="sel_crypto(this.id)">USDT</a>
                          </li>                                                     
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ __('messages.wallet_adr') }}</label>                        
                        <input type="text" class="form-control" name="actNo" required placeholder="{{ __('messages.wallet_adr') }}">
                        <input id="crypto_type" type="hidden" value="" class="form-control" name="bname" required placeholder="">
                    </div>
                </div>
            </div>           

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="collcc btn btn-info">{{ __('Add') }}</button>
                    </div>
                </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>



<!-- /////////////////   Add Paypal modal /////////////////////////////////////////////// -->

<div class="modal fade modal_bg_color" id="add_paypal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle text-primary">{{ __('messages.add_paypal_act') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="/user/add/bank">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ __('messages.add_paypal_act2') }}</label>                        
                        <input type="email" class="form-control" name="actNo" required placeholder="{{ __('messages.user_login_frm_email') }}">
                        <input type="hidden" value="Paypal" class="form-control" name="bname" required placeholder="">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ __('messages.act_nam') }}</label>                        
                        <input type="text" class="form-control" name="act_name" required placeholder="{{ __('messages.act_nam') }}">
                    </div>
                </div>
            </div>           

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="collcc btn btn-info">{{ __('Add') }}</button>
                    </div>
                </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>