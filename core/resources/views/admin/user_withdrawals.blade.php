@php($page_title = __('messages.wthdrwls'))
@php($wd = search_withdrawal())
@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5 bg-white">
                    <div id="prnt"></div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" >
                                    <div class="card-head-row card-tools-still-right">
                                        <h5 class="text-primary"> 
                                            {{ __('messages.usr_wthdrwl') }}
                                        </h5>
                                        <div class="card-tools">
                                            <form action="/admin/search/deposit" method="post">
                                                <div class="form-group d-flex flex-row justify-content-center align-items-center">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="text" name="search_val" class="form-control border_radius_15px" placeholder=" {{ __('messages.search_by') }} ">
                                                    <i class="fa fa-search ml--5 search_btn_on_input"></i>
                                                </div>
                                            </form>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="card-body pb-0 scrollable_div">
                                   @include('admin.temp.user_withdrawal') 
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

@endSection