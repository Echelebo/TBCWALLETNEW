
        <div class="pb-4 pl-4">
            <?php                
                $invs = App\Models\packages::where('status', 1)->orderby('id', 'asc')->get();                
            ?>
            @if($user->phone != '')
                @if(isset($invs) && count($invs) > 0)
                    @foreach($invs as $inv)

                        <div class="row border_btm p-2">
                            <div class="col-xs d-flex justify-content-center align-items-center">
                                <i class="fa fa-sign-in-alt text-primary fa-2x"></i>
                            </div>
                            <div class="col pt-4">
                                <h5>{{$inv->package_name}} {{ __('messages.pckg') }}</h5>
                                <p class="margin_top_n10">
                                    {{ round($inv->daily_interest*$inv->period*100, 2)}}% {{__('messages.for')}}
                                    {{$inv->period}}
                                    {{ __('messages.days')}}

                                    <span class="pl-3">
                                        {{ __('messages.min_invstm') }}: {{$settings->currency}} {{$inv->min}}; 
                                        {{ __('messages.max_invstm') }}: {{$settings->currency}} {{$inv->max}}
                                    </span>
                                </p>
                            </div>                                          
                            <div class="col-xs d-flex justify-content-center align-items-center float-right pr-4">
                                <a id="{{$inv->id}}" href="javascript:void(0)" class="collcc btn btn-info" onclick="confirm_inv('{{$inv->id}}', '{{$inv->package_name}}', '{{$inv->period}}', '{{$inv->daily_interest}}', '{{$inv->min}}', '{{$inv->max}}', '{{$user->wallet}}')">
                                    {{ __('messages.invst') }}
                                </a>
                            </div>
                        </div>                            
                    @endforeach
                @endif
            @else
                <div class="alert alert-warning">
                    <a href="/{{$user->username}}/profile#userdet">{{ __('messages.pls_udt_prf') }}</a>
                </div>
            @endif
        </div>
    