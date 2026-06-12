<?php
    if(\Request::has('rejected')){
        $deps = App\Models\deposits::where('status', 2)->orderby('id', 'desc')->get();
    }
    if(\Request::has('pending')){
        $deps = App\Models\deposits::where('status', 0)->orderby('id', 'desc')->get();
    }
    if(\Request::has('approved')){
        $deps = App\Models\deposits::where('status', 1)->orderby('id', 'desc')->get();
    }
?>

            <div class="row mb-5">
                <div class="col-md-12 ">
                    <a class="float-right" href="?rejected"><i class="fa fa-circle text-grey"></i> {{ __('messages.rejctd') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?pending"><i class="fa fa-circle text-warning"></i> {{ __('messages.pending') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?approved"><i class="fa fa-circle text-success"></i> {{ __('messages.apprv') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?"><i class="fa fa-circle text-primary"></i> {{__('messages.all_text')}} &nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>

            <table id="basic-datatables" class="table table-stripped table-hover mt-5 px-0" >
                <thead>
                    <tr>
                        <th class="text-left p-0 " width="10px">{{ __('messages.icon') }}</th>
                        <th>{{ __('messages.user') }}</th>
                        <th>{{ __('messages.det') }}</th>
                        <th>{{ __('messages.pop') }}</th>
                        <th>{{ __('messages.amount') }}</th>
                        <th class="text-right">{{ __('messages.actn') }}</th>
                    </tr>
                </thead> 
                <tbody>                    
                    @if(count($deps) > 0 )
                        @foreach($deps as $dep)
                            <tr>
                                <td width="10px">
                                    <i class="fa-solid fa-circle-arrow-down-left fa-2x text-primary"></i>
                                </td>
                                <td class="text-nowrap">
                                    <b>{{ucfirst($dep->usn)}} </b>
                                    <br> 
                                    {{substr($dep->created_at, 0, 10)}}
                                </td>
                                <td class="text-nowrap">
                                    <b>{{$dep->bank}}</b>
                                    <br>
                                    {{$dep->account_no}}
                                </td>  
                                <td class="text-nowrap">
                                    <b>{{__('messages.mbc_proof')}}</b>
                                    <br>
                                    @if($dep->url != '')
                                        <a href="{{$dep->url}}" target="_blank">View pop</a>
                                            <!--<img src='/img/pmethod/{{$dep->pop}}' alt="proof" height='20px' width='20px'>-->
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <span class="text-success"><b>+ {{$dep->amount}} {{$dep->currency}}</b></span>
                                    <br>
                                    <span class="">
                                        @if($dep->status == 0)
                                            {{ __('messages.pending') }}
                                        @elseif($dep->status == 1)
                                            {{ __('messages.apprv') }}
                                        @elseif($dep->status == 2)
                                            {{ __('messages.rejctd') }}
                                        @endif
                                    </span>
                                        
                                </td> 
                                <td>

                                    <div class="dropdown show">
                                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-circle-ellipsis fa-2x text-primary"></i>
                                        </a>

                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" title="Reject Deposit" href="/admin/reject/user/payment/{{$dep->id}}" > 
                                            <i class="fa fa-ban text-warning" ></i> Reject
                                        </a> 
                                        @if($adm->role == 3)
                                            <a class="dropdown-item" title="Approve Deposit" href="/admin/approve/user/payment/{{$dep->id}}" > 
                                                <i class="fa fa-check text-success"></i> Approve
                                            </a>
                                            <a class="dropdown-item" title="Delete Deposit" href="/admin/delete/user/payment/{{$dep->id}}" > 
                                                <i class="fa fa-times text-danger"></i> Delete
                                            </a>
                                        @endif                                       
                                      </div>
                                    </div>
                                                                       
                                       
                                </td>        
                            </tr>
                            
                        @endforeach
                    @else
                        
                    @endif
                </tbody>
            </table>
            <div class="" align=""> 
            </div> 
            <br><br>
        