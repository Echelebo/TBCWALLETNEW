<?php
    $musers = App\User::orderby('created_at', 'asc')->get();
    $mInv = App\Models\investment::orderby('date_invested', 'asc')->get();
    $mDep = App\Models\deposits::orderby('created_at', 'asc')->get();
    $mWd = App\Models\Withdrawal::orderby('w_date', 'asc')->get();
    
?>

  
<div class="row">
    <div class="d-flex align-items-center justify-content-between w-100">
        <div class="col-6" style=" padding-top: 30px;">
            <span class="btn btn-default" id="search_mt" align="center">
                {{__('messages.all_stat')}}
            </span>
            <br><br>   
        </div>
        <div class="col-6 text-right">        
            <form id="search_form_stat" action="#">
                <div class=" margin_top_10 d-flex flex-row justify-content-end align-items-center" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    @php($da = date('Y-m'))   
                    <label><b>{{ __('messages.search_dat') }} &nbsp;</b></label>
                    <input id="datepicker" value="{{$da}}" type="text"  name="search_val" class="form-control input_height_45 " required placeholder="">
                    <!-- <div class="input-group-append span_bg">                      -->
                        <button class="btn" style="margin-left: -50px; background-color: transparent;"><i class="fa fa-search"></i></button>
                    <!-- </div> -->
                        
                </div>
            </form>                                   
        </div>        
    </div>
</div>


<div class="row margin_top_10"> 
    <div class="col-6 col-sm-3 btn_prepend">        
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">{{ __('messages.users') }}</p>
                            <h6 id="uCount" class="">{{count($musers)}}</h6>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-3 btn_prepend" >
        @php($dep = 0)
        @php($dep2 = 0)
        @foreach($mInv as $in)
            @php($dep = $dep + intval($in->capital) )                       
        @endforeach
        <div class="card card-stats card-success card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">{{ __('messages.wd_ivt') }}</p>
                            <h6 id="iCount" class="">{{$settings->currency}} {{ $dep }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="col-6 col-sm-3 btn_prepend">
        @php($dep = 0)
        @php($dep2 = 0)
        @foreach($mDep as $in)                        
            @php($dep = $dep + intval($in->amount) )                        
        @endforeach
        <div class="card card-stats card-secondary  card-round">
            <div class="card-body">                        
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">{{ __('messages.dpsts') }}</p>
                            <h6 id="dCount" class="">{{$settings->currency}} {{$dep}}</h6>
                        </div>
                    </div>  
                </div>
            </div>
        </div>        
    </div>

    <div class="col-6 col-sm-3 btn_prepend" >        
        @php($dep = 0)
        @php($dep2 = 0)
        @foreach($mWd as $in)                        
            @php($dep = $dep + intval($in->amount) )                        
        @endforeach
        <div class="card card-stats card-warning card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="fa-regular fa-square-dollar"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">{{ __('messages.wthdrwl') }}</p>
                            <h6 id="wCount" class="">{{$settings->currency}} {{$dep}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        
    </div>
    
    <!-- <div class="col-sm-12">
        <div align="center">
            <span id="adminStatChart_m_legend" class="admin_stat_legend" align="center"></span>
        </div> 
        <div id="cart_cont" class="chart-container" style="min-height: 375px">
            <canvas id="adminStatChart_m"></canvas>
        </div>

        <div id="piechart"></div>
                  
    </div> -->

</div>

<?php
       
        $musersDate = $mInvDate = $mDepDate = $mWdDate = [];
        $musersVal = $mInvVal = $mDepval = $mWdVal = [];  
        $pt = "";
        $cnt = 0;
        $sum_cap = 0;

        foreach ($musers as $in) {
            if($pt != date('Y-m-d', strtotime($in->created_at)))
            {           $sum_cap = 0;    
                $pt = date('Y-m-d', strtotime($in->created_at));
                $musersDate[$cnt] = date('d/m/y', strtotime($in->created_at));
                $m_count = App\Models\withdrawal::where('created_at', 'like','%'.$pt.'%')->get();                
                $musersVal[$cnt] = count($m_count);
                $sum_cap = 0;
                $cnt += 1;
            }
        } 
        $pt = "";
        $cnt = 0;
        $sum_cap = 0;
        foreach ($mInv as $in) {
            if($pt != date('Y-m-d', strtotime($in->created_at)))
            {               
                $pt = date('Y-m-d', strtotime($in->created_at));
                $mInvDate[$cnt] = date('d/m/y', strtotime($in->created_at));
                $m_count = App\Models\withdrawal::where('created_at', 'like','%'.$pt.'%')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->amount;
                }
                $mInvVal[$cnt] = $sum_cap;
                $sum_cap = 0;
                $cnt += 1;
            }
        } 
        $pt = "";
        $cnt = 0;
        $sum_cap = 0;
        foreach ($mDep as $in) {
            if($pt != date('Y-m-d', strtotime($in->created_at)))
            {               
                $pt = date('Y-m-d', strtotime($in->created_at));
                $mDepDate[$cnt] = date('d/m/y', strtotime($in->created_at));
                $m_count = App\Models\withdrawal::where('created_at', 'like','%'.$pt.'%')->orderby('id', 'desc')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->amount;
                }
                $mDepval[$cnt] = $sum_cap;
                $cnt += 1;
                $sum_cap = 0;
            }
        }
        $pt = "";
        $cnt = 0;
        $sum_cap = 0;
        foreach ($mWd as $in) {
            if($pt != date('Y-m-d', strtotime($in->created_at)))
            {               
                $pt = date('Y-m-d', strtotime($in->created_at));
                $mWdDate[$cnt] = date('d/m/y', strtotime($in->created_at));
                $m_count = App\Models\withdrawal::where('created_at', 'like','%'.$pt.'%')->orderby('id', 'desc')->get();
                foreach ($m_count as $n) 
                {
                    $sum_cap += $n->amount;
                }
                $mWdVal[$cnt] = $sum_cap;
                $cnt += 1;
                $sum_cap = 0;
            }
        }            
    ?>

    <script type="text/javascript">
        var musersDate = JSON.parse('{!! json_encode($musersDate) !!}');
        var musersVal = JSON.parse('{!! json_encode($musersVal) !!}');

        var mInvDate = JSON.parse('{!! json_encode($mInvDate) !!}');
        var mInvVal = JSON.parse('{!! json_encode($mInvVal) !!}');

        var mDepDate = JSON.parse('{!! json_encode($mDepDate) !!}');
        var mDepval = JSON.parse('{!! json_encode($mDepval) !!}'); 

        var mWdDate = JSON.parse('{!! json_encode($mWdDate) !!}');
        var mWdVal = JSON.parse('{!! json_encode($mWdVal) !!}');

        $('#search_form_stat').submit(function(e){
            // alert('here');
            e.preventDefault();
            var data = new FormData(document.getElementById('search_form_stat'));            
            $.ajax
            ({
                url: "/admin/search/stat",
                type: "post",                
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success:function(result)
                {
                    var str = result;
                    musersDate = str[0];
                    musersVal = str[4];

                    mInvDate = str[1];
                    mInvVal = str[5];

                    mDepDate = str[2];
                    mDepval = str[6];

                    mWdDate = str[3];
                    mWdVal = str[7];

                    $('#uCount').html(str[8]);
                    $('#iCount').html(str[9]);
                    $('#dCount').html(str[10]);
                    $('#wCount').html(str[11]);
                    $('#search_mt').text(str[12]);
                    // loadStat(musersDate, musersVal);

                },
                error: function (xhr) {                     
                    alert(xhr.responseText)                     
                }


               
            }); 
            
        });

///////////////////// load default ////////////////////////////////////////////////////////////////

        $('#adminStatChart_m_legend').text('User Statistics');

        // loadStat(musersDate, musersVal);

        // function load_Stat(){
        //     $('#adminStatChart_m_legend').text('User Statistics');
        //     loadStat(musersDate, musersVal);            
        // }

        // function load_iStat(){
        //     $('#adminStatChart_m_legend').text('Investment Statistics');
        //     load_g_chart(mInvDate, mInvVal);            
        // }

        // function load_dStat(){
        //     $('#adminStatChart_m_legend').text('Deposits Statistics');
        //     load_g_chart(mDepDate, mDepval);            
        // }

        // function load_wStat(){
        //     $('#adminStatChart_m_legend').text('Withdrawal Statistics');
        //     load_g_chart(mWdDate, mWdVal);            
        // }
        
    </script>
