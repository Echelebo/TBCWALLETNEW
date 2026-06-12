<?php
    
    $actInv = App\Models\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();

    $refs = App\Models\ref::where('username', $user->username)->orderby('id', 'desc')->get();
    $ref_amt = 0;
    foreach($refs as $ref)
    {
       $ref_amt += $ref->amount;
    }
    $ref_bal = $ref_amt - $user->ref_bal;

    $totalEarning = 0;   
    $currentEarning = 0;
    $workingDays = 0;
    

    foreach($actInv as $inv)
    {
        $totalElapse = getDays(date('y-m-d'), $inv->end_date);
        if($totalElapse == 0)
        {
            $lastWD = $inv->last_wd;
            $enddate = ($inv->end_date);
            $workingDays = getDays($lastWD, $enddate);
            $currentEarning += $workingDays*$inv->interest*$inv->capital;
        }
        else
        {
            $sd = $inv->last_wd;
            $ed = date('Y-m-d');
            $workingDays = getDays($sd, $ed);
            $currentEarning += $workingDays*$inv->interest*$inv->capital;
        }
    }
?>


<div class="scrollable_div">            
    <table id="basic-datatables" class="table table-striped table-hover">
        <thead class="web-table">
            <tr> 
                <th> {{ __('') }} </th>
                <th> {{ __('messages.pckg') }} </th>
                <th> {{ __('messages.cptl') }} </th>
                <th> {{ __('messages.ivt_return') }} </th>
                <th> {{ __('messages.erng') }} </th> 
                <th> {{ __('messages.more') }} </th> 
            </tr>
        </thead>
        
        <tbody>
            
            @if(count($actInv) > 0 )
                @foreach($actInv as $in)
                    <?php
                        $totalElapse = getDays(date('y-m-d'), $in->end_date);
                        if($totalElapse == 0)
                        {
                            $lastWD = $in->last_wd;
                            $enddate = ($in->end_date);
                            $Edays = getDays($lastWD, $enddate);
                            $ern  = $Edays*$in->interest*$in->capital;
                            $withdrawable = $ern;
                                                                 
                            $totalDays = getDays($in->date_invested, $in->end_date);
                            $ended = "yes";

                        }
                        else
                        {
                            $lastWD = $in->last_wd;
                            $enddate = (date('Y-m-d'));
                            $Edays = getDays($lastWD, $enddate);
                            $ern  = $Edays*$in->interest*$in->capital;
                            $withdrawable = 0;
                            if ($Edays >= $in->days_interval)
                            {
                                $withdrawable = $in->days_interval*$in->interest*$in->capital;
                            }
                                                           
                            $totalDays = getDays($in->date_invested, date('Y-m-d'));
                            $ended = "no";
                        }

                    ?>
                    <tr class="">
                        <td width="10px">
                            <i class="fa-solid fa-badge-dollar fa-2x text-primary"></i>
                        </td>
                        <td>{{$in->package}}</td>
                        <td>{{$in->capital}}</td>
                        <td>{{$in->i_return}}</td>
                        <td>
                            <a title="Withdraw" href="javascript:void(0)" onclick="wdnone('{{$in->id}}', '{{$ern}}', '{{$withdrawable}}', '{{$Edays}}', '{{$ended}}')">
                                {{$user->currency}} {{$ern}}
                            </a>
                        </td> 
                        <td>
                            <a title="Click to view more" href="javascript:void(0)" data-toggle="modal" data-target="#inv_{{$in->id}}">
                                <i class="fa-solid fa-circle-ellipsis fa-2x"></i>
                            </a>
                        </td> 
                    </tr>
                    
                    <div id="inv_{{$in->id}}" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body row p-0">
                                    <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
    							        <div class="text-white text-center">
    							            <i class="fa-solid fa-circle-info fa-3x text-white"></i><br>
    							            Investment details
    							        </div>
    							    </div>
    							    <div class="col-sm-8 pt-2 pb-3">
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.pckg') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->package}}
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.cptl') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->currency}}{{$in->capital}}
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.ivt_return') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->currency}}{{round ($in->i_return, 2)}}
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.dt_invstd') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->date_invested}}
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.elps') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->end_date}}
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.ivt_wdrn') }}
                                            </div>
                                            <div class="col font-italic">
                                                @if($in->status != 'Expired')
                                                    {{$totalDays}}
                                                @else
                                                    0
                                                @endif
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.days_spnt') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$totalDays}}                                            
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.sts') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->status}}                                            
                                            </div> 
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col font-weight-bold">
                                                {{ __('messages.erng') }}
                                            </div>
                                            <div class="col font-italic">
                                                {{$in->currency}} {{round ($ern, 2)}}                                         
                                            </div> 
                                        </div> 
                                        
                                        <hr>
        								<div class=" row d-flex flex-row justify-content-center align-items-center">
            							    <div class="">
            							        &emsp;
            							        <a class="" title="Pause Investment" href="/admin/pause/user_inv/{{$in->id}}" > 
                									<i class="fa-solid fa-circle-stop fa-2x text-warning"></i>
                								</a>
            							    </div>
            							    <div class="">
            							        @if($adm->role == 3)
            							            &emsp;
                									<a class="ml-1" title="Activate Investment" href="/admin/activate/user_inv/{{$in->id}}" > 
                									    <i class="fa-solid fa-circle-play fa-2x text-success"></i>
                									</a>
                								@endif
            							    </div>
            							    <div class="">
            							        @if($adm->role == 3)
            							            &emsp;
                									<a class=" ml-1" title="Delete Investment" href="/admin/delete/user_inv/{{$in->id}}" > 
                										<i class="fa-solid fa-circle-trash fa-2x text-danger"></i>
                									</a>
                								@endif
            							    </div>
            							</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                @endforeach
            @else
                
            @endif
        </tbody>
    </table>

    
</div>
 