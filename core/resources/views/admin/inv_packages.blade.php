@php($page_title = __('messages.pkgs'))
@php($packs = search_pack())
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
                                        <h5 class="text-primary"> {{ __('messages.ivt_pckgs') }} </h5>
                                        <div class="card-tools">
                                            <a href="/admin/create/package" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('messages.add') }} </a>
                                        </div>                                                                       
                                    </div>
                                </div>
                                <div class="card-body pb-0 scrollable_div">
                                   @include('admin.temp.inv_pack') 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            @include('admin.inc.edit_pack')

@endSection