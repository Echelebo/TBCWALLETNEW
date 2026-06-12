@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($page_title = __('messages.prfl'))
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5 bg-white"> 
                    <div class="row mt--2">
                        <div class="col-md-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title"><h5 class="text-primary"> {{ __('messages.prfl') }} </h5></div>  
                                    <hr>                                 
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            @if($adm->img == "")
                                                <img src="/img/adminAvatar/any.png" alt="avatar" class="admin_usr_img_size">
                                            @else
                                                <img src="/img/adminAvatar/{{$adm->img}}" alt="avatar" class="admin_usr_img_size">
                                            @endif
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row b_btm">
                                                <div class="col-6"><b> {{ __('messages.nam') }} </b>:</div>
                                                <div class="col-6">{{$adm->name}}</div>
                                            </div>
                                            <div class="row b_btm ">
                                                <div class="col-6"><b> {{ __('messages.admin_frm_email') }} </b>:</div>
                                                <div class="col-6">{{$adm->email}}</div>
                                            </div>
                                            <div class="row b_btm ">
                                                <div class="col-md-6"><b> {{ __('messages.lvl') }} </b>:</div>     
                                                <div class="col-md-6">{{$adm->role}}</div>     
                                            </div>
                                            <div class="row b_btm ">
                                                <div class="col-md-6"><b> {{ __('messages.crtd_on') }} </b>:</div>   
                                                <div class="col-md-6">{{substr($adm->created_at,0,10)}} </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title"><h5 class="text-primary">{{ __('messages.chng_pwd') }} </h5></div>                                       
                                    </div>
                                </div>
                                <div class="card-body mb-5">
                                    <form action="/admin/change/pwd" method="post">
                                        <input id="token" type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">                                          
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " ><i class="fa fa-key"></i></span>
                                            </div>
                                              <input type="Password" class="form-control" name="oldpwd" placeholder="{{ __('messages.old_pwd') }} " required>
                                          </div>
                                          <br>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text "><i class="fa fa-key"></i></span>
                                            </div>
                                              <input id="" type="password" class="form-control" name="newpwd" placeholder="{{ __('messages.new_pwd') }} " required>
                                        </div>
                                          <br>
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">               
                                              <span class="input-group-text "><i class="fa fa-key"></i></span>
                                            </div>
                                              <input id="" type="password" class="form-control" name="cpwd" placeholder="{{ __('messages.confrm_pwd') }} " required>
                                        </div>
                                          <br>
                                          
                                        <div class="form-group">
                                            <br>
                                              <button class="collb btn btn-info"> {{ __('messages.updt_pwd') }} </button>
                                              <br>
                                        </div>                                          
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div id="prnt"></div>
                    <div class="row">
                        
                    </div>
                    
                </div>
            </div>
@endSection