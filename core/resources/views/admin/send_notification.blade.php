@php($page_title = __('messages.snd_notifctn'))
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
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h5 class="text-primary" > {{ __('messages.snd_notifctn') }} </h5>
                                    </div>
                                </div>
                                <div class="card-body pb-0 scrollable_div">
                                   @include('admin.temp.send_not') 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" >
                                    <div class="card-head-row card-tools-still-right">
                                        <h5 class="text-primary" style="">{{ __('messages.prevs_notfyc') }} </h5>
                                    </div>
                                </div>
                                <div class="card-body pb-0 scrollable_div">
                                   @include('admin.temp.old_msg') 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
@endSection