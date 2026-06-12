@extends('admin.atlantis.layout')
@Section('content')
        
        <div class="main-panel">
            <div class="content">
                @php($page_title = __('messages.dasbrd'))
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5 bg-white">
                    @include('admin.atlantis.overview')
                    <div id="prnt"></div>
                    @if($adm->role > 1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-primary">
                                            <h5>{{ __('messages.mnth_brk_down') }} </h5>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        @include('admin.temp.monthly')
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head-row card-tools-still-right">
                                                <div class="card-title"><h5 class="text-primary"> {{ __('messages.transactions') }} </h5></div>
                                                <div class="card-tools">
                                                    <ul class="nav nav-tab" id="myTab" role="tablist">
                                                      <li class="nav-item ">
                                                        <a class="nav-link active custom-tab" id="pills-widget-tab" data-toggle="pill" href="#tab_in" role="tab" aria-controls="pills-contact" aria-selected="false">
                                                          <i class="fas fa-arrow-down"></i>
                                                          {{ __("In") }}
                                                        </a>
                                                      </li>  
                                                      <li class="nav-item">
                                                        <a class="nav-link custom-tab" id="pills-lang_tab-tab" data-toggle="pill" href="#tab_out" role="tab" aria-controls="pills-lang_tab" aria-selected="false">
                                                          <i class="fas fa-arrow-up"></i>
                                                          {{ __('Out') }}
                                                        </a>
                                                      </li> 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active " id="tab_in" role="tabpanel" >
                                                    
                                                        <?php 
                                                            $depst = App\Models\deposits::orderby('id', 'desc')->take(10)->get();
                                                        ?>
                                                        @if(!empty($depst))
                                                            @foreach($depst as $dep)
                                                                <div class="row border_btm p-3">
                                                                    <div class="col-xs d-flex justify-content-center align-items-center ">
                                                                        <i class="fa-solid fa-circle-arrow-down fa-2x text-primary"></i>
                                                                    </div>
                                                                    <div class="col mt-1">
                                                                      <div class="row">
                                                                        <div class="col-8">
                                                                          <h6>{{ucfirst($dep->usn)}}   {{ __('messages.depstss') }} </h6>
                                                                        </div>                                                                    
                                                                        <div class="col text-success" align="right">
                                                                          <b>+{{$dep->amount}}</b>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row mt--2">
                                                                        <div class="col-8">
                                                                          {{$dep->bank}}
                                                                          
                                                                        </div>                                                                    
                                                                        <div class="col " align="right">
                                                                            @if($dep->status == 0)
                                                                                {{ __('messages.pending') }}
                                                                            @elseif($dep->status == 1)
                                                                                {{ __('messages.apprv') }}
                                                                            @elseif($dep->status == 2)
                                                                                {{ __('messages.rejctd') }}
                                                                            @endif
                                                                        </div>
                                                                      </div>                                               
                                                                    </div>   
                                                                </div> 
                                                            @endforeach
                                                        @else
                                                            {{__('No data')}}
                                                        @endif
                                                    
                                                </div>
                                            
                                                <div class="tab-pane fade" id="tab_out" role="tabpanel" >
                                                    
                                                    <?php 
                                                        $inv_dash = App\Models\withdrawal::orderby('id', 'desc')->take(10)->get();
                                                    ?>
                                                    @if(!empty($inv_dash))
                                                        @foreach($inv_dash as $dep)
                                                            <div class="row border_btm p-3">
                                                                <div class="col-xs d-flex justify-content-center align-items-center ">
                                                                    <i class="fa-solid fa-circle-arrow-right fa-2x text-primary"></i>
                                                                </div>
                                                                <div class="col mt-1">
                                                                  <div class="row">
                                                                    <div class="col-8">
                                                                      <h6>{{$dep->usn}}   {{ __('messages.req_wd') }} </h6>
                                                                    </div>                                                                    
                                                                    <div class="col text-danger" align="right">
                                                                      <b>-{{$dep->currency}} {{$dep->amount}}</b>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row mt--2">
                                                                    <div class="col-8">
                                                                      {{$dep->created_at}}
                                                                    </div>                                                                    
                                                                    <div class="col" align="right">
                                                                        {{$dep->status}}
                                                                    </div>
                                                                  </div>                                               
                                                                </div>   
                                                            </div> 
                                                        @endforeach
                                                    @else
                                                        {{__('No data')}}
                                                    @endif   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head-row ">
                                                <h5 class=" text-primary"> {{ __('messages.invstmnt') }} </h5> 
                                                <div class="card-tools card-tools-still-right">
                                                    <a href="/admin/manage/investments">All Investments</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php 
                                                        $inv_dash = App\Models\investment::orderby('id', 'desc')->take(10)->get();
                                                    ?>
                                                    @if(!empty($inv_dash))
                                                        @foreach($inv_dash as $dep)
                                                            <div class="row border_btm p-3">
                                                                <div class="col-xs d-flex justify-content-center align-items-center ">
                                                                    <i class="fa-solid fa-circle-dollar fa-2x text-primary"></i>
                                                                </div>
                                                                <div class="col mt-1">
                                                                  <div class="row">
                                                                    <div class="col-8">
                                                                      <h6>{{$dep->usn}}   {{ __('messages.invsted') }} </h6>
                                                                    </div>                                                                    
                                                                    <div class="col text-primary" align="right">
                                                                      <b>{{$dep->capital}}</b>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row mt--2">
                                                                    <div class="col-8">
                                                                      {{$dep->package}} 
                                                                    </div>                                                                    
                                                                    <div class="col" align="right">
                                                                        {{$dep->status}}
                                                                    </div>
                                                                  </div>                                               
                                                                </div>   
                                                            </div> 
                                                        @endforeach
                                                    @else
                                                        {{__('No data')}}
                                                    @endif
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                        
                        
                    </div>
                    
                </div>
            </div>

@endSection

@push('scripts')

    <script>
        Circles.create({
            id:'circles-1',
            radius:45,
            value:'{{count($users->where("status", "=", 1))}}',
            maxValue:'{{count($users)}}',
            width:7,
            text: '{{count($users->where("status", "=", 1))}}',
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-2',
            radius:45,
            value:'{{count($inv->where("status", "=", "Active"))}}',
            maxValue:'{{ count($inv) }}',
            width:7,
            text: '{{count($inv->where("status", "=", "Active"))}}',
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-3',
            radius:45,
            value:'{{count($deposits->where("status", "=", 1))}}',
            maxValue:'{{ count($deposits) }}',
            width:7,
            text: '{{count($deposits->where("status",      "=", 1))}}',
            colors:['#f1f1f1', '#F25961'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-logs',
            radius:45,
            value:'{{count($logs->where("admin", "=", $adm->email))}}',
            maxValue:'{{ count($logs) }}',
            width:7,
            text: '{{count($logs->where("admin", "=", $adm->email))}}',
            colors:['#f1f1f1', '#F25961'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-admLevel',
            radius:45,
            value:'{{$adm->role}}',
            maxValue:'{{$adm->role}}',
            width:7,
            text: '{{$adm->role}}',
            colors:['#f1f1f1', '#0289b1'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

            

    </script>

    <?php
        $nw = date('Y-m-d');
        $from = date('Y-m-d', strtotime($nw. "-12 months"));
        $inv = App\Models\investment::whereBetween('date_invested',    [$from, $nw])->orderby('id', 'asc')->get();
        // $inv = App\Models\deposits::whereBetween('date_invested',    [$from, $nw])->orderby('id', 'asc')->get();

        $inv_dates = [];
        $inv_vals = []; 

        $dep_dates = [];
        $dep_vals = []; 

        $pt = "";
        $cnt = 0;
        foreach ($inv as $in) {
            if($pt != date('Y-m', strtotime($in->date_invested)))
            {               
                $pt = date('Y-m', strtotime($in->date_invested));
                $inv_dates[$cnt] = date('m/y', strtotime($in->date_invested));
                $m_count = App\Models\investment::where('date_invested', 'like','%'.date('Y-m', strtotime($in->date_invested)).'%')->orderby('id', 'asc')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->capital;
                }
                $inv_vals[$cnt] = $sum_cap;
                $cnt += 1;
            }
        }
    /////////////////////// for deposits //////////////////

        $nw = date('Y-m-d H:s:i');
        $from = date('Y-m-d H:s:i', strtotime($nw. "-12 months"));          
        $dep_st = App\Models\deposits::whereBetween('created_at',    [$from, $nw])->orderby('id', 'asc')->get();
        $pt = "";
        $cnt = 0;
        foreach ($dep_st as $in) {
            if($pt != date('Y-m', strtotime($in->created_at)))
            {               
                $pt = date('Y-m', strtotime($in->created_at));
                $dep_dates[$cnt] = date('m/y', strtotime($in->created_at));
                $m_count = App\Models\deposits::where('created_at', 'like','%'.date('Y-m', strtotime($in->created_at)).'%')->orderby('id', 'asc')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->amount;
                }
                $dep_vals[$cnt] = $sum_cap;
                $cnt += 1;
            }
        }
        
    ?>
    

    <!-- //////////////////// Withdrawal stats /////////////////////////////////////////////////// -->

    <?php
        $nw = date('Y-m-d H:s:i');
        $from = date('Y-m-d H:s:i', strtotime($nw. "-12 months"));          
        $wd_st = App\Models\withdrawal::whereBetween('created_at',    [$from, $nw])->orderby('id', 'asc')->get();
        $inv_dates = [];
        $inv_vals = []; 
        $pt = "";
        $cnt = 0;
        foreach ($wd_st as $in) {
            if($pt != date('Y-m', strtotime($in->created_at)))
            {               
                $pt = date('Y-m', strtotime($in->created_at));
                $inv_dates[$cnt] = date('m/y', strtotime($in->created_at));
                $m_count = App\Models\withdrawal::where('created_at', 'like','%'.date('Y-m', strtotime($in->created_at)).'%')->orderby('id', 'asc')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->amount;
                }
                $inv_vals[$cnt] = $sum_cap;
                $cnt += 1;
            }
        }       
    ?>

@endpush
            