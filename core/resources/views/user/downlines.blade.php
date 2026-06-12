@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = __('messages.my_dwnlns'))
                @php($page_info = __('messages.my_dwnlns2'))
                @include('user.atlantis.main_bar2')
                <div class="page-inner mt--5 bg-white">
                    <div id="prnt"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow pb-5 ">
                                <div class="card-header">
                                    <div class="card-title text-primary"><h5>{{ __('messages.ref_earn') }}</h5> </div>
                                </div>
                                <div class="card-body pb-2">
                                    <p>Use the link below to invite your friends </p>
                                    <div class="alert text_nowrap1 ref_link_copy" >
                                        <i class="fa-solid fa-paperclip text-primary"></i>
                                        <span id="reflnk" class="text_grey2">https://{{env('APP_URL').__('/register/').$user->username}}</span>
                                        <span class="float-right text-primary hand_pointer" title="Copy link" onclick="copy_txt()">
                                            <i class="fa fa-copy"></i> Copy
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no_box_shadow">
                                <div class="card-header">
                                    <div class="card-title text-primary"><h5>{{ __('messages.my_dwnlns') }}</h5></div>
                                </div>
                                <div class="card-body pb-5">                                            
                                    <div class="table-responsive mt-5">                                        
                                        <table id="basic-datatables" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th scope="col" class="d-none d-sm-table-cell">{{ __('messages.nam') }}</th>
                                                    <th>{{ __('messages.username') }}</th>
                                                    <th>{{ __('messages.lvl') }}</th>
                                                    <th>{{ __('messages.amnt_ernd') }}</th>
                                                    <th scope="col" class="d-none d-sm-table-cell">{{ __('messages.investments') }}</th>
                                                    <th scope="col" class="d-none d-sm-table-cell">{{ __('messages.date_reg') }}</th>   
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    $ref_levels = App\Models\ref_set::all();
                                                    $rsum = 0;
                                                ?>                    
                                                @foreach($ref_levels as $ref_level)
                                                    <?php
                                                        $activities = App\Models\ref::where('username', $user->username)->where('level', $ref_level->id)->orderby('id', 'asc')->get();
                                                        // $rsum += $activities
                                                    ?>
                                            
                                                    @if(count($activities) > 0 )
                                                        @foreach($activities as $activity)
                                                            <?php  
                                                                $ref_d = App\Models\User::find($activity->user_id);                
                                                            ?>
                                                            <tr>                                                            
                                                                <td>
                                                                    {{$ref_d->firstname}} {{$ref_d->lastname}}
                                                                </td>
                                                                <td>{{$ref_d->username}}</td>
                                                                <td>{{$activity->level}}</td>
                                                                <td>{{ env('CURRENCY').' '.$activity->amount}}</td>
                                                                <td>
                                                                    <?php  
                                                                        $ref_inv = App\Models\investment::where('user_id', $activity->user_id)->get();
                                                                        echo count($ref_inv);
                                                                    ?>
                                                                </td>                                                            
                                                                <td>{{substr($ref_d->created_at,0,10)}}</td>                     
                                                            </tr>
                                                            @php($rsum += $activity->amount)
                                                        @endforeach
                                                    @else
                                                        <tr>                                                    
                                                            <td colspan="6">{{ __('messages.no_data') }} </td>                     
                                                        </tr>
                                                    @endif
                                                @endforeach  
                                            </tbody>                                                    
                                        </table>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @include('user.inc.confirm_inv')

@endSection
            