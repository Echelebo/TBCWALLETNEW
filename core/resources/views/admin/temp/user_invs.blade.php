<?php	
	if(Session::has('val'))
	{
		$v = Session::get('val');
		$actInv = App\Models\investment::where('user_id', $v)->orwhere('usn', 'like', '%'.$v.'%')->orwhere('capital', $v)->orwhere('status', $v)->orwhere('date_invested', 'like', '%'.$v.'%')->orderby('id', 'desc')->get();
		Session::forget('val');
	}
	else
	{
		$actInv = App\Models\investment::orderby('id', 'desc')->get();
	}

	if(\Request::has('active')){
		$actInv = App\Models\investment::where('status', 'Active')->orderby('id', 'desc')->get();
	}
	if(\Request::has('paused')){
		$actInv = App\Models\investment::where('status', 'Paused')->orderby('id', 'desc')->get();
	}
	if(\Request::has('expired')){
		$actInv = App\Models\investment::where('status', 'Expired')->orderby('id', 'desc')->get();
	}

	// dd($actInv);

?>

<div class="row mb-5">
	<div class="col-md-12 ">
		<a class="float-right" href="?expired"><i class="fa fa-circle text-grey"></i> {{__('messages.exp')}} &nbsp;&nbsp; &nbsp;</a>
		<a class="float-right" href="?paused"><i class="fa fa-circle text-warning"></i> {{__('messages.act_paused')}} &nbsp;&nbsp;&nbsp;</a>
		<a class="float-right" href="?active"><i class="fa fa-circle text-success"></i> {{__('messages.sts_active')}} &nbsp;&nbsp;&nbsp;</a>
		<a class="float-right" href="?"><i class="fa fa-circle text-primary"></i> {{__('messages.all_text')}} &nbsp;&nbsp;&nbsp;</a>
	</div>
</div>
			   
<table id="basic-datatables" class="table table-stripped table-hover mt-5" >	
	<thead>
      <tr>
         <th class="text-left p-0 " width="10px">{{ __('messages.icon') }}</th>
         <th>{{ __('messages.user') }}</th>
         <th>{{ __('messages.pckg') }}</th>
         <th>{{ __('messages.cptl') }}</th>
         <th>{{ __('messages.date') }}</th>
         <th>{{ __('messages.status') }}</th>
         <th class="text-right">{{ __('messages.actn') }}</th>
      </tr>
   </thead> 
	<tbody class="">  
		@if(count($actInv) > 0 )
			@foreach($actInv as $in)
				<?php

					$totalElapse = getDays(date('y-m-d'), $in->end_date);
					if($totalElapse == 0)
					{
						$lastWD = $in->last_wd;
						$enddate = ($in->end_date);
						$Edays = getDays($lastWD, $enddate);
						$ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
						$withdrawable = $ern;
															 
						$totalDays = getDays($in->date_invested, $in->end_date);
						$ended = "yes";

					}
					else
					{
						$lastWD = $in->last_wd;
						$enddate = (date('Y-m-d'));
						$Edays = getDays($lastWD, $enddate);
						$ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
						$withdrawable = 0;
						if ($Edays >= $in->days_interval)
						{
							$withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
						}
													   
						$totalDays = getDays($in->date_invested, date('Y-m-d'));
						$ended = "no";
					}

				?>
				<tr class="">
					<td width="10px">
						<i class="fa-solid fa-badge-dollar fa-2x text-primary"></i>
					</td>
					<td>{{$in->usn}}</td>
					<td>{{$in->package}}</td>
					<td>{{$in->currency}}{{$in->capital}}</td>
					<!-- <td>{{$in->currency}}{{round ($in->i_return, 2)}}</td> -->
					<td>{{$in->date_invested}}</td>
					<td>{{$in->status}}</td>
					<td>
					    <i class="fa-solid fa-circle-ellipsis fa-2x text-primary" data-toggle="modal" data-target="#{{$in->id}}"></i>
					</td>
				</tr>      
				<div id="{{$in->id}}" class="modal fade " role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
					<div class="modal-dialog ">
						<!-- Modal content-->
						<div class="modal-content padding_0" >
							<div class="modal-body row p-0">
							    <div class="col-sm-4 pop_up_modal_side_bg d-flex flex-column justify-content-center align-items-center">
							        <div class="text-white text-center">
							            <i class="fa-solid fa-circle-info fa-3x text-white"></i><br>
							            {{__('messages.inv_det')}}
							        </div>
							    </div>
							    <div class="col-sm-8 pt-2 pb-3">
							        <div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.pckg') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->package}}
    									</div> 
    								</div>
    								
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.cptl') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->currency}}{{$in->capital}}
    									</div> 
    								</div>
    								
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.ivt_return') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->currency}}{{round ($in->i_return, 2)}}
    									</div> 
    								</div>
    							
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.dt_invstd') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->date_invested}}
    									</div> 
    								</div>
    							
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.elps') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->end_date}}
    									</div> 
    								</div>
    								
    								<div class="row  mt-2">
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
    							
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.days_spnt') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->w_amt}}                                            
    									</div> 
    								</div>
    								
    								<div class="row  mt-2">
    									<div class="col font-weight-bold">
    										{{ __('messages.sts') }}
    									</div>
    									<div class="col font-italic">
    										{{$in->status}}                                            
    									</div> 
    								</div>
    							
    								<div class="row  mt-2">
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

<div style="padding-bottom: 20px;"></div>

<div class="" align="">
</div>