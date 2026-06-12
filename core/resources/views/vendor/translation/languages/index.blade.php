@php($page_title = __('messages.Sttng'))
@extends('translation::layout')
@section('body')
        <div class="main-panel mt-6">
            <div class="content">          
                @if(count($languages))
                    <div class="card shadow-none">
                        <div class="card-header bg-transparent mt-5">
                            <div class="row p-4">
                                <div class="col">
                                    <h5 class="text-primary">{{ __('translation::translation.languages') }}</h5>
                                </div>
                                <div class="col">
                                    <div class="text-right">
                                        <a href="{{ route('languages.create') }}" class="btn btn-primary">
                                            {{ __('translation::translation.add') }}
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-body">
                            
                            <div class="table-responsive mb-5 mt-n6 ">
                                <table class="table dt-responsive align-items-center  table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('translation::translation.language_name') }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('translation::translation.change') }}</th>
                                             <th class="text-right text-uppercase text-secondary text-xs font-weight-bolder opacity-7 px-2">{{ __('messages.actn') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-borderless">
                                        
                                        
                                        @foreach($languages as $language => $name)
                                            
                                            <tr class="table-borderless">
                                                <td>
                                                    {{ strtoupper($name) }}
                                                </td>
                                                
                                                <td>
                                                    @if( $language != session()->get('locale') ) 
                                                        <a href="{{route('language.change',$language)}}" class="btn text-primary border" title="{{trans('msg.activate')}}">
                                                            <i class="fa-duotone fa-exchange text_suc"></i>
                                                            {{ __('messages.set') }}
                                                        </a>
                                                    @else
                                                        <button class="btn btn-success">{{ __('messages.sts_active') }}</button>
                                                    @endif
                                                    
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('languages.translations.index', $language) }}" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i> {{ __('messages.edit') }}
                                                    </a>
                                                    <a href="{{ route('language.delete', $language) }}" class="ml-1 btn btn-danger">
                                                        <i class="fa fa-trash"></i> {{ __('messages.delete') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

@endsection