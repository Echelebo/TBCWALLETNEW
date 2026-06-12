@php($page_title = __('messages.suprt_ttl'))
@php($deps = search_deposit())
@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5">
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title col-sm-12 text-primary"  >
                                            <h5>{{ __('messages.v_sprt_msg') }}</h5>                                         
                                        </div>
                                    </div>
                                     
                                </div>
                                <div class="card-body">
                                    <div class="scrollable_div">                                        
                                        <table id="basic-datatables" class="table table-striped table-hover" >
                                            <thead>
                                                <tr> 
                                                    <th>{{ __('messages.tckt_id') }}</th>
                                                    <th>{{ __('messages.user_id') }}</th> 
                                                    <th>{{ __('messages.ttl') }}</th>
                                                    <th>{{ __('messages.sts') }}</th>
                                                    <th>{{ __('messages.actn') }}</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if(!empty($tickets))
                                                    @foreach($tickets as $ticket)
                                                        <tr>
                                                            <td class="text-nowrap">{{$ticket->ticket_id}}</td>
                                                            <td class="text-nowrap">{{$ticket->user_id}}</td>
                                                            <td class="text-nowrap">{{$ticket->title}}</td>
                                                            <td>
                                                                @if($ticket->status == 0)
                                                                    {{__('Closed')}}
                                                                @elseif($ticket->status == 1)
                                                                    {{__('Open')}}
                                                                @endif
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="View Chat" href="/support/{{$ticket->id}}" class="">
                                                                    <i class="fa-solid fa-messages fa-2x text-primary"></i>
                                                                    @if($ticket->state == 1 && $ticket->status != 0)
                                                                        @php($rd = 1)
                                                                    @endif
                                                                    @foreach($ticket->comments as $comment)
                                                                        @if($comment->state == 1 && $comment->sender != 'support')
                                                                            @php($rd = 1)
                                                                        @endif
                                                                    @endforeach
                                                                    @if(isset($rd) && $rd == 1)
                                                                        <i class="fa fa-circle new_not"></i>
                                                                        @php($rd = 0)
                                                                    @endif
                                                                </a>                                                                
                                                                @if($ticket->status == 0)
                                                                    <a title="Delete Ticket" href="{{ route('support.delete', $ticket->id) }}" class="">
                                                                        <i class="fa-solid fa-trash-xmark fa-2x text-danger"></i>
                                                                    </a>
                                                                @else
                                                                    <a title="Close Ticket" href="{{ route('support.close', $ticket->id) }}" class="">
                                                                       <i class="fa-solid fa-comment-xmark fa-2x text-warning"></i>
                                                                    </a>
                                                                @endif
                                                            </td>                                                                                 
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    
                                                @endif
                                            </tbody>
                                        </table>
                                        {{$tickets->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
@endSection