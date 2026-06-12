<div class="row mt--2">
	@foreach($inv as $in)     
    @php($cap = $cap + intval($in->capital) )
  @endforeach 

 <?php
 $deposits = App\Models\deposits::where('status', 1)-> orderby('id', 'desc')->get();
 ?>        
  @foreach($deposits as $in)
    @php($dep += $in->amount)  
  @endforeach

 <?php
 $wd = App\Models\withdrawal::where('status', 'Approved')-> orderby('id', 'desc')->get();
 ?> 
  @foreach($wd as $in)    
    @php($wd_bal += $in->amount )       
  @endforeach 

	<div class="col-md-6">
		<div class="card full-height">
			<div class="card-body">
				<div class="card-title"><h5 class="text-primary">{{ __('messages.bal_summ') }}</h5></div>
				<div class="row py-3 @if($adm->role < 2) {{'blur_cnt'}} @endif" style="position: relative;">
					<div class="col-md-4 d-flex flex-column justify-content-around">						
						<div class="border_btm_1">
							<p class="mt-4">{{$settings->currency}} {{ $cap }}</p>
							<p class="text-black op-8">{{ __('messages.wd_ivt') }}</p>
							<!-- <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div> -->
							<br>						
						</div>
					</div>
					<div class="col-md-4">
						<div class="border_btm_1">								
							<p class="mt-4">{{$settings->currency}} {{ $dep }}</p>
							<p class=" text-black op-8">{{ __('messages.dpsts') }}</p>
							<!-- <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div> -->
							<br>									
						</div>
					</div>
					<div class="col-md-4">
						<div class="border_btm_1">
							<p class="mt-4">{{$settings->currency}} {{$wd_bal}}</p>
							<p class="text-black op-8">{{ __('messages.wthdrwls') }}</p>
							<!-- <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div>	 -->
							<br>	
						</div>
					</div>
				</div>		       
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card full-height">
			<div class="card-body">
				<div class="card-title"><h5 class="text-primary">{{ __('messages.stats_summ') }}</h5></div>
				<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
					<div class="px-2 pb-2 pb-md-0 text-center">
						<div id="circles-1"></div>
						<p class=" mt-3 mb-0">{{ __('messages.users') }}</p>
                        <!--<span>{{ __('messages.inactive') }}: {{count($users->where('status', '!=', '1'))}}</span>-->
					</div>
					<div class="px-2 pb-2 pb-md-0 text-center">
                        <?php
                            $inv = App\Models\investment::orderby('id', 'desc')->get();
                            $cap = 0;
                            $cap2 = 0;
                        ?>                        
						<div id="circles-2"></div>
						<p class=" mt-3 mb-0">{{ __('messages.investments') }}</p>
                        <!--<span>{{ __('messages.inactive') }}: {{count($inv->where('status', '!=', 'Active'))}}</span>-->
					</div>
					<div class="px-2 pb-2 pb-md-0 text-center">
                        <?php
                            $deposits = App\Models\deposits::orderby('id', 'desc')->get();
                            $dep = 0;
                            $dep2 = 0;
                        ?>           
						<div id="circles-3"></div>
						<p class=" mt-3 mb-0">{{ __('messages.dpsts') }}</p>
            			<!--<span>{{ __('messages.inactive') }}: {{count($deposits->where('status', '!=', '1'))}}</span>-->
					</div>
				</div>
			</div>
		</div>
	</div>

  
</div>