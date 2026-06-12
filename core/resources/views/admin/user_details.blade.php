@php($page_title = __('messages.usr_det_adm'))
@php($user_data = user_details_data($id))
@php($user = $user_data['user'])
@php($dt = $user_data['dt'])
@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5">
                    <div id="prnt"></div>
                    <ul class="nav nav-tab  mt-5 pl-1" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active custom-tab" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link custom-tab" id="inv-tab" data-toggle="pill" href="#inv" role="tab" aria-controls="inv" aria-selected="false">Investment</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link custom-tab" id="wdw-tab" data-toggle="pill" href="#wdw" role="tab" aria-controls="wdw" aria-selected="false">Withdrawal</a>
                        </li>                        
                        <li class="nav-item">
                          <a class="nav-link custom-tab" id="bank-tab" data-toggle="pill" href="#bank" role="tab" aria-controls="bank" aria-selected="false">Account</a>
                        </li>                            
                        <li class="nav-item">
                          <a class="nav-link custom-tab" id="ref-tab" data-toggle="pill" href="#ref" role="tab" aria-controls="ref" aria-selected="false">Referral</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link custom-tab" id="sec-tab" data-toggle="pill" href="#sec" role="tab" aria-controls="sec" aria-selected="false">Security</a>
                        </li>                                                        
                    </ul>
                    <div class="tab-content mt-4" id="pills-tabContent">
                        <div class="row p-2 tab-pane fade  show active" id="profile" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" >
                                        <div class="card-head-row card-tools-still-right">
                                            <h5 class="text-primary"> {{ __('messages.usr_det_adm') }} </h5>
                                            <div class="card-tools">
                                                <a href="/admin/block/user/{{$user->id}}" > 
                                                    <span>&nbsp;&nbsp;<i class="fa fa-ban text-warning" ></i></span>
                                                </a>
                                                <a href="/admin/activate/user/{{$user->id}}" > 
                                                    <span>&nbsp;&nbsp;<i class="fa fa-check text-success"></i></span>
                                                </a>
                                                @if($adm->role != 1)
                                                    <a href="/admin/delete/user/{{$user->id}}" > 
                                                        <span>&nbsp;&nbsp;<i class="fa fa-times text-danger"></i></span>
                                                    </a>
                                                @endif
                                            </div>                                                                             
                                        </div>
                                    </div>
                                    <div class="card-body">                                    
                                        <div class="row pad_top_20">
                                            <div class="col-lg-6">
                                                <div class="form-group" align="center">
                                                    @if($user->img == "")
                                                        <img class="img-responsive" src="/img/any.png" width="200px" height="200px">
                                                    @else
                                                        <img class="img-responsive" src="/img/profile/{{ $user->img }}" width="200px" height="200px">
                                                    @endif
                                                </div>

                                                <div class="form-group" align="center">
                                                   <a href="javascript:void(0)" data-toggle="modal" data-target="#add_fund_modal" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add_fund') }} </a> 
                                                   <a href="javascript:void(0)" data-toggle="modal" data-target="#remove_fund_modal"class="btn btn-danger" ><i class="fa fa-minus"></i> {{ __('messages.Rem_fund') }} </a>
                                                </div>

                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="card full-height">
                                                    <div class="card-body">
                                                        <div class="text-primary">
                                                            <h5 class=""> {{ __('messages.act_sumry') }} </h5>
                                                        </div>
                                                        <hr>
                                                        <div class="row py-3 @if($adm->role < 2) {{blur_cnt}}@endif position_relative">
                                                            <div class="col-md-6 d-flex flex-column justify-content-around">
                                                                <div class="border_btm_1">
                                                                    <h6 class="  text-info op-8"> {{ __('messages.wlt_bal') }} </h6>
                                                                    <h5 class="">{{$settings->currency}} {{ round($user->wallet,2) }}</h5>
                                                                    <div class="colhd margin_top_n10 font_10">&emsp;</div>
                                                                </div>                      
                                                              <div class="clearfix"><br></div>                      
                                                                <div>                           
                                                                    <h6 class=" text-info op-8"> {{ __('messages.refrrl_bns') }} </h6>
                                                                    <h5 class="">{{$settings->currency}} {{ round ($user->ref_bal, 2)}}</h5>
                                                                    <div class="colhd margin_top_n10 font_10 ">&emsp;</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="border_btm_1" >
                                                                    <h6 class="text-info op-8"> {{ __('messages.date_create') }} </h6>
                                                                    {{$dt->format('Y-m-d')}}
                                                                    <div class="colhd margin_top_n10 font_10">&emsp;</div> 
                                                                    <br>    
                                                                </div>
                                                                <div class="clearfix"><br></div> 
                                                                <div>
                                                                    <h6 class=" text-info op-8"> {{ __('messages.sts') }} </h6>
                                                                    <span class="">
                                                                    @if($user->status == 1 || $user->status == 'Active') 
                                                                        <i class="fas fa-circle text-success"></i> {{ __('messages.sts_active') }}
                                                                    @elseif($user->status == 2 || $user->status == 'Blocked') 
                                                                        <i class="fas fa-circle text-danger"></i> {{ __('messages.blck') }}
                                                                    @elseif($user->status == 0 || $user->status == 'Inactive') 
                                                                        <i class="fas fa-circle text-grey"></i> {{ __('messages.not_active') }}
                                                                    @endif
                                                                    </span> 
                                                                   
                                                                    <div class="colhd margin_top_n10 font_10" >&emsp;</div> 
                                                                    <br>    
                                                                </div>

                                                            </div>

                                                        </div>             
                                                    </div>
                                                </div>                                            
                                                
                                            </div>                               
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> {{ __('messages.first_name') }} </label>
                                                    <input id="adr" type="text" value="{{ucfirst($user->firstname)}}" class="form-control" name="fname" readonly>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> {{ __('messages.lst_nam') }} </label>
                                                    <input id="adr" type="text" value="{{ucfirst($user->lastname)}}" class="form-control" name="lname" readonly>
                                                </div>
                                            </div>                               
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> {{ __('messages.user_login_frm_email') }} </label>
                                                    <div class="input-group">                                                       
                                                        <input id="email" type="email" value="{{$user->email}}" class="form-control" name="email">
                                                    </div>
                                                    
                                                </div>
                                            </div>     

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> {{ __('messages.username') }} </label>
                                                    <div class="input-group">                                                       
                                                        <input id="usn" type="text" value="{{$user->username}}" class="form-control" name="usn" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>                                             
                                            
                                        </div>   

                                        <form class="" method="post" action="/admin/update/user/profile">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="uid" value="{{$user->id}}">
                                                        <label> {{ __('messages.cntry') }} </label>
                                                        <select id="country" class="form-control" name="country" >
                                                            <?php 
                                                                $country = App\Models\country::orderby('name', 'asc')->get();
                                                            ?>
                                                            @php($phn_code = '')
                                                            @foreach($country as $c)                                                           
                                                                @if($c->id == $user->country)
                                                                    @php($cs = $c->id)
                                                                    @php($phn_code = $c->phonecode)
                                                                    {{'selected'}}
                                                                    <option selected  value="{{$c->id}}">{{$c->name}}</option>
                                                                 
                                                                @else
                                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                                @endif
                                                            @endforeach
                                                            @if(!isset($cs))
                                                                    <option selected disabled>{{ __('messages.select_country') }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <label> {{ __('messages.state_prvc') }} </label>
                                                        <select  id="states" class="form-control" name="state" required>
                                                            @if(isset($cs))
                                                                <?php 
                                                                    $st = App\Models\states::where('id', $user->state)->get();
                                                                ?>
                                                                @if(count($st) > 0)
                                                                    <option selected value="{{$st[0]->id}}">{{$st[0]->name}}</option>
                                                                @else
                                                                    <option selected disabled>{{ __('messages.select_state') }} </option>
                                                                @endif
                                                                
                                                            @else
                                                               <option selected disabled>{{ __('messages.select_state') }} </option>
                                                            @endif                                                           
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label> {{ __('messages.adr') }} </label>
                                                        <input id="adr" type="text" class="form-control" value="{{$user->address}}" name="adr" required>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label> {{ __('messages.phn') }} </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span id="countryCode" class="input-group-text">
                                                                    @if(isset($phn_code))
                                                                        {{'+'.$phn_code}}
                                                                    @else
                                                                        +1
                                                                    @endif
                                                                </span>
                                                            </div>                                                        
                                                            <input id="cCode" type="hidden" class="form-control" name="cCode" required>
                                                            <input id="phone" type="text" class="form-control" value="{{str_replace('+'.$phn_code,'',$user->phone)}}" name="phone" required>
                                                        </div>
                                                        
                                                    </div>
                                                </div>                                             
                                                
                                            </div>   
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                           <button class="collb btn btn-info"> {{ __('messages.save') }} </button>
                                                    </div>
                                                </div>              
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2 tab-pane fade" id="sec" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="text-primary"> {{ __('messages.rst_usr_pwd') }} </h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <form class="" method="post" action="/admin/change/user/pwd">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="uid" value="{{$user->id}}">
                                            <div class="form-group">
                                                <label> {{ __('messages.new_pwd') }} </label>
                                                <input type="password" class="form-control" name="newpwd"  required>
                                            </div>
                                            <div class="form-group">
                                                <label> {{ __('messages.cnfrm_pwd') }} </label>
                                                <input type="password" class="form-control" name="cpwd"  required>
                                            </div>
                                                <div class="form-group" align="left">
                                                   <button class="collb btn btn-info"> {{ __('messages.save') }} </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row  p-2 tab-pane fade" id="inv" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="text-primary"> {{ __('messages.usr_inv') }} </h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        @include('admin.temp.user_inv')
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2 tab-pane fade" id="wdw" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="text-primary"> {{ __('messages.wthdrwl_hstry') }} </h5>
                                    </div>
                                    <div class="card-body pb-0 scrollable_div">
                                        @include('admin.temp.user_wd_history')
                                        <br><br>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row p-2 tab-pane fade" id="ref" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="text-primary"> {{ __('messages.referrals') }} </h5>
                                    </div>
                                    <div class="card-body pb-0 scrollable_div">
                                        @include('admin.temp.user_ref')
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2 tab-pane fade" id="bank" role="tabpanel">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="text-primary"> <h5>{{ __('messages.bnk_act') }}</h5> </div>
                                    </div>
                                    <div class="card-body pb-0 scrollable_div">
                                        <table  id="basic-datatables-bank" class="table table-stripped table-hover">
                                            <thead>
                                                <tr>
                                                    <th> {{ __('messages.bnk_nam') }} </th>
                                                    <th> {{ __('messages.act_numb') }} </th>
                                                    <th> {{ __('messages.act_nam') }} </th>
                                                    <th> {{ __('messages.swt_nam') }} </th>
                                                    <!--<th> {{ __('messages.actn') }} </th>-->
                                                </tr>
                                            </thead>                                        
                                            <tbody>
                                                <?php 
                                                     $mybanks = App\Models\banks::where('user_id', $user->id)->get();
                                                ?>
                                                @if(count($mybanks) > 0)
                                                    @foreach($mybanks as $bank)
                                                        <tr>
                                                            <td>{{$bank->Bank_Name}}</td>
                                                            <td>{{$bank->Account_number}}</td>
                                                            <td>{{$bank->Account_name}}</td>
                                                            <td>{{$bank->Swift_number}}</td>
                                                            <!--<td></td>-->
                                                        </tr>
                                                    @endforeach
                                                @endif
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

            <div class="modal fade" id="add_fund_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"><b>{{ __('messages.add_fund') }}</b></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('admin_add_fund')}}">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <h5><i class="fas fa-thumbtack"></i> {{ __('messages.enter_amt') }} </h5>
                                        <input type="text" name="amt" value="" class="form-control" placeholder="Amount" required >
                                        <input type="hidden" name="uid" value="{{$user->id}}" class="form-control" required >
                                    </div> 
                                    <div class="col-sm-12 mt-3">
                                        <input type="submit" class="btn btn-primary" value="{{ __('messages.add_fund') }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="remove_fund_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"><b>{{ __('messages.Rem_fund') }}</b></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('admin_remove_fund')}}">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <h5><i class="fas fa-thumbtack"></i> {{ __('messages.enter_amt') }} </h5>
                                        <input type="text" name="amt" value="" class="form-control" placeholder="Amount" required >
                                        <input type="hidden" name="uid" value="{{$user->id}}" class="form-control" required >
                                    </div> 
                                    <div class="col-sm-12 mt-3">
                                        <input type="submit" class="btn btn-danger" value="{{ __('messages.Rem_fund') }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                                                        
                        </div>
                    </div>
                </div>
            </div>
@endSection

@push('scripts')

    <script >
        $('#basic-datatables-w').DataTable();
        $('#basic-datatables-ref').DataTable();
        $('#basic-datatables-bank').DataTable();
    </script>

@endpush
            