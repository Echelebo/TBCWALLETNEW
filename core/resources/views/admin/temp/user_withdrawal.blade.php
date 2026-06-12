<?php
    if(\Request::has('rejected')){
        $wd = App\Models\withdrawal::where('status', 'Rejected')->orderby('id', 'desc')->get();
    }
    if(\Request::has('pending')){
        $wd = App\Models\withdrawal::where('status', 'Pending')->orderby('id', 'desc')->get();
    }
    if(\Request::has('approved')){
        $wd = App\Models\withdrawal::where('status', 'Approved')->orderby('id', 'desc')->get();
    }
?>

            <div class="row mb-5">
                <div class="col-md-12 ">
                    <a class="float-right" href="?rejected"><i class="fa fa-circle text-grey"></i> {{ __('messages.rejctd') }} &nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?pending"><i class="fa fa-circle text-warning"></i> {{ __('messages.pending') }} &nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?approved"><i class="fa fa-circle text-success"></i> {{ __('messages.apprv') }} &nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="float-right" href="?"><i class="fa fa-circle text-primary"></i> {{__('messages.all_text')}} &nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>
            <table id="basic-datatables" class="table table-stripped table-hover mt-4">     
                <thead>
                    <tr>
                        <th class="text-left p-0 " width="10px">{{ __('messages.icon') }}</th>
                        <th>{{ __('messages.user') }}</th>
                        <th>{{ __('messages.amount') }}</th>
                        <th>{{ __('messages.receiving') }}</th>
                        <th>{{ __('messages.date') }}</th>
                        <th class="text-right">{{ __('messages.actn') }}</th>
                    </tr>
                </thead>            
                <tbody>
                    
                    @if(count($wd) > 0 )
                        @foreach($wd as $dep)
                            <tr>                                                            
                                <td width="10px">
                                    <i class="fa-solid fa-circle-arrow-right fa-2x text-primary"></i>
                                </td>
                                <td class="text-nowrap">
                                    <b>{{$dep->usn}}</b>
                                    <br>
                                    {{substr($dep->created_at, 0, 10)}}
                                </td>
                                <td class="text-nowrap">
                                    <span class=""><b>-{{$dep->amount}} {{$dep->currency}} </b></span>
                                    <br>
                                    {{$dep->account}}
                                </td>                                
                                <td class="text-nowrap">
                                    <span class="text-danger"><b>-{{$dep->recieving}} {{$dep->currency}} </b></span>
                                    <br>
                                    {{$dep->status}}
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-circle-ellipsis fa-2x text-primary"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" title="Reject" href="/admin/reject/user/wd/{{$dep->id}}" > 
                                                <i class="fa fa-ban text-warning" ></i> Reject
                                            </a> 
                                            @if($adm->role == 3)
                                                <a class="dropdown-item" title="Approve" href="/admin/approve/user/wd/{{$dep->id}}" > 
                                                    <i class="fa fa-check text-success"></i> Approve
                                                </a>
                                                <a class="dropdown-item" title="Delete" href="/admin/delete/user/wd/{{$dep->id}}" > 
                                                    <i class="fa fa-times text-danger"></i> Delete
                                                </a>
                                            @endif                                       
                                        </div>
                                    </div>                                   
                                </td>
                            </tr>
                        @endforeach
                    @else
                        
                    @endif
                </tbody>
            </table>
<div class="mb-5"></div>

            