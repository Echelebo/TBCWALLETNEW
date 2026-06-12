@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.my_invstm'))
                @php($page_info = __('messages.inv_overview'))
                
                <div class="row" style="background-color: #FFF;">
                    <div class="col col-md-7">
                        @include('user.atlantis.main_bar2')
                    </div>
                    <div class="col col-md-5 mt-3 pr-5" align="right">
                        <a href="/{{$user->username}}/investments" class="btn btn-primary btn-border btn-round mr-2">
                            {{ __('messages.invest_btn') }}
                        </a>
                        <a href="/{{$user->username}}/wallet" class="btn btn-secondary btn-round">
                            {{ __('messages.dpsts') }}
                        </a>
                    </div>                   
                </div>
                <div class="page-inner mt--5 bg-white">
                   
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.my_invstm') }}</h5>
                                        </div>                                       
                                    </div>
                                </div>
                                <div class="card-body ">  
                                    <div class="table-responsive web-table">
                                        <table class="display table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>{{ __('messages.pckg') }}</th>
                                                    <th>{{ __('messages.cptl') }}</th>
                                                    <th>{{ __('messages.date') }}</th> 
                                                    <th>{{ __('messages.elps') }}</th>  
                                                    <th>{{ __('messages.days_spnt') }}</th> 
                                                    <th>{{ __('messages.sts') }}</th>
                                                    <th>{{ __('messages.tot_erng') }}</th>  
                                                    <th>{{ __('messages.actn') }}</th> 
                                                </tr>
                                            </thead>
                                            <tbody class="web-table">                                                
                                                @if(count($actInv) > 0 )
                                                    @foreach($actInv as $in)
                                                        <?php
                                                           
                                                            if($in->method == 1)
                                                            {
                                                                $totalElapse = getWorkingDays(date('Y-m-d'), $in->end_date);
                                                            }
                                                            else
                                                            {
                                                                $totalElapse = getDays(date('Y-m-d'), $in->end_date);
                                                            }
                                                            if($totalElapse == 0)
                                                            {
                                                                $lastWD = $in->last_wd;
                                                                $enddate = $in->end_date;

                                                                if($in->method == 1)
                                                                {
                                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                                    $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                                }
                                                                else
                                                                {
                                                                    $Edays = getDays($lastWD, $enddate);
                                                                    $totalDays = getDays($in->date_invested, $in->end_date);
                                                                }

                                                                $ern  = $Edays*$in->interest*$in->capital;
                                                                $withdrawable = $ern;                                                                
                                                                $ended = "yes";
                                                            }
                                                            else
                                                            {
                                                                $lastWD = $in->last_wd;
                                                                $enddate = date('Y-m-d');                                                                
                                                                if($in->method == 1)
                                                                {
                                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                                    $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                                }
                                                                else
                                                                {
                                                                    $Edays = getDays($lastWD, $enddate);
                                                                    $totalDays = getDays($in->date_invested, date('Y-m-d'));
                                                                }
                                                                $ern  = $Edays*$in->interest*$in->capital;
                                                                $withdrawable = 0;
                                                                if ($Edays >= $in->days_interval)
                                                                {
                                                                    $withdrawable = round($Edays*$in->interest*$in->capital,2);
                                                                }
                                                                $ended = "no";
                                                            }
                                                        ?>
                                                        <tr class="">
                                                            <td>{{$in->package}}</td>
                                                            <td>{{($settings->currency)}} {{$in->capital}}</td>     
                                                            <td>{{$in->date_invested}}</td>
                                                            <td>{{$in->end_date}}</td> 
                                                            <td>{{$totalDays}}</td>
                                                            <td>{{$in->status}}</td>
                                                            <td>{{$settings->currency}} {{ number_format((float)$ern, 2) }} </td>
                                                            <td>
                                                                <a title="{{__('messages.wthdrw')}}" href="javascript:void(0)" class="btn btn-info" onclick="wd('pack', '{{$in->id}}', '{{$ern}}', '{{ $withdrawable }}', '{{$Edays}}', '{{$ended}}')">
                                                                    <i class="fas fa-arrow-down"></i>
                                                                </a>                                                                
                                                            </td>           
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="text-right col-md-12">{{ $actInv->links() }}</div>
                                    </div>

                                    <div class="mobile_table container messages-scrollbar" >
                                                    
                                        @if(count($actInv) > 0 )
                                            @foreach($actInv as $in)
                                                <?php

                                                    if($in->method == 1)
                                                    {
                                                        $totalElapse = getWorkingDays(date('Y-m-d'), $in->end_date);
                                                    }
                                                    else
                                                    {
                                                        $totalElapse = getDays(date('Y-m-d'), $in->end_date);
                                                    }
                                                    if($totalElapse == 0)
                                                    {
                                                        $lastWD = $in->last_wd;
                                                        $enddate = $in->end_date;

                                                        if($in->method == 1)
                                                        {
                                                            $Edays = getWorkingDays($lastWD, $enddate);
                                                            $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                        }
                                                        else
                                                        {
                                                            $Edays = getDays($lastWD, $enddate);
                                                            $totalDays = getDays($in->date_invested, $in->end_date);
                                                        }

                                                        $ern  = $Edays*$in->interest*$in->capital;
                                                        $withdrawable = $ern;                                                                
                                                        $ended = "yes";
                                                    }
                                                    else
                                                    {
                                                        $lastWD = $in->last_wd;
                                                        $enddate = date('Y-m-d');                                                                
                                                        if($in->method == 1)
                                                        {
                                                            $Edays = getWorkingDays($lastWD, $enddate);
                                                            $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                        }
                                                        else
                                                        {
                                                            $Edays = getDays($lastWD, $enddate);
                                                            $totalDays = getDays($in->date_invested, date('Y-m-d'));
                                                        }
                                                        $ern  = $Edays*$in->interest*$in->capital;
                                                        $withdrawable = 0;
                                                        if ($Edays >= $in->days_interval)
                                                        {
                                                            $withdrawable = $Edays*$in->interest*$in->capital;
                                                        }
                                                        $ended = "no";
                                                    }

                                                ?>
                                                 
                                                @include('user.inc.mob_inv')                                
                                                
                                            @endforeach
                                        @else
                                            
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="card-title text-primary">
                                        <h5>{{__('messages.avail_pckg')}}</h5>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    @include('user.inc.packages')
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    
                </div>
            </div>

    @include('user.inc.confirm_inv')
    @include('user.inc.withdrawal')

@endSection
            