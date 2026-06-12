
        <form class="form-horizontal" method="POST" id="" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
            {{ csrf_field() }}
                    <div class="input-group">
                        <!--<div class="input-group-prepend">-->
                        <!--    <span class="input-group-text"><b>{{$settings->currency}}</b></span>-->
                        <!--</div>-->
                        <input id="amount" type="number" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>                    
                    </div>
                    @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ __('messages.err_amount') }}</strong>
                        </span>
                    @endif

            
            
                
                    <button type="submit" class="btn btn-primary mt-2">
                        {{ __('messages.pay_now') }}
                    </button>
            

        </form>
