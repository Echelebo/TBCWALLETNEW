@extends('admin.atlantis.layout')
@Section('content')
    <div class="main-panel">
        <div class="content">
            @php($page_title = __('messages.manage_usr'))
            @include('admin.atlantis.main_bar')
            <div class="page-inner mt--5">
               
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <div class="card-head-row card-tools-still-right">
                                    <h5 class="text-primary" > {{ __('messages.all_usrs') }} </h5>
                                    <div class="card-tools">
                                       <!-- <form action="/admin/search/user" method="post">
                                            <div class="form-group d-flex flex-row justify-content-center align-items-center">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="text" name="search_val" class="form-control border_radius_15px" placeholder=" {{ __('messages.search_by') }} ">
                                                <i class="fa fa-search ml--5 search_btn_on_input"></i>
                                            </div>
                                        </form> -->
                                    </div>                                                                             
                                </div>
                                @php($users_table = search_users())                               
                                <!-- <p class="card-category text-white" > {{ __('messages.all_regstrd_usrs') }} </p> -->
                            </div>
                            <div class="card-body scrollable_div ">
                                
                                <table id="basic-datatables" class="basic-table table table-stripped table-hover">     
                                    <thead>
                                        <tr>
                                            <th class="text-left px-0">{{ __('messages.users') }}</th>
                                            <th>{{ __('messages.admin_frm_email') }}</th>
                                            <th>{{ __('messages.sts') }}</th>
                                            <th class="text-right">{{ __('messages.actn') }}</th>
                                        </tr>
                                    </thead>                                       
                                    <tbody> 
                                        @if(count($users_table) > 0 )
                                            @foreach($users_table as $user)
                                                <tr>
                                                    <td class="text-left px-0">
                                                        <div class="d-flex align-items-center justify-content-left">
                                                            <span>
                                                                @if($user->status == 1 || $user->status == 'Active')
                                                                    <i class="fa-solid fa-user  text-success"></i>
                                                                @elseif($user->status == 2 || $user->status == 'Not Active')
                                                                    <i class="fa-solid fa-user  text-danger"></i>
                                                                @else
                                                                    <i class="fa-solid fa-user text-black"></i>
                                                                @endif                                                                
                                                            </span>
                                                            <span class="px-1 text-nowrap">
                                                                {{$user->firstname}} {{$user->lastname}}
                                                            </span>
                                                        </div>
                                                            
                                                    </td>                                                    
                                                    <td>
                                                        {{$user->email}} <br> {{$user->phone}}
                                                    </td>
                                                    <td>
                                                        @if($user->status == 1 || $user->status == 'Active')
                                                            <span class=" text-success "> {{ __('messages.sts_active') }} </span>
                                                        @elseif($user->status == 2 || $user->status == 'Not Active')
                                                            <span class=" text-danger "> {{ __('messages.blck') }} </span>
                                                        @else
                                                            <span class=" text-black "> {{ __('messages.new_user') }} </span>
                                                        @endif 
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-info" href="/admin/view/userdetails/{{$user->id}}" title="{{ __('messages.v_usr_det') }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>          
                                                </tr>
                                            @endforeach
                                        @else
                            
                                        @endif  
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endSection

@push('scripts')


@endpush