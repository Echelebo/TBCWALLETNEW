@php($adm_users = search_adm())
@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($page_title = __('messages.adm_usrs'))
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5">
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="card-head-row card-tools-still-right col">
                                        <h5 class="text-primary">{{ __('messages.adm_usrs') }}</h5> 
                                    </div>
                                    <div class=" col">
                                        <a type="button" class="btn btn-primary float-right text-white" data-toggle="modal" data-target="#myModal">
                                            +<i class="fa fa-user"></i> Add User
                                        </a> 
                                    </div>
                                </div>
                                <div class="card-body">                    
                                    <div class="scrollable_div">
                                        @include('admin.temp.admin')  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            <div id="myModal" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">
                            {{ __('messages.add_nw_usrs') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">                                                            
                        <div class="col-sm-12">
                            @include('admin.temp.add_new_admin')  
                        </div>  
                      </div>
                      
                    </div>

                </div>
            </div>
@endSection