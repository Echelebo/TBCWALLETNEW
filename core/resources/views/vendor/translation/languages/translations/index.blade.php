@php($page_title = __('messages.Sttng'))
@extends('translation::layout')
@section('body')

    <div class="main-panel mt-6">
        <div class="content">       
            <form action="{{ route('languages.translations.index', ['language' => $language]) }}" method="get">
                <div class="card  px-5">
                    <div class=" row mt-5">
                        <div class="col">
                            <h5 class="text-primary">{{ __('translation::translation.translations') }}</h5>
                        </div>
                        <div class="col text-right">
                            <a class="ms-2 btn text-primary bg-white" href="{{ route('languages.index') }}">
                                <i class="fa fa-arrow-left"></i> {{__('messages.go_back') }}
                            </a>
                        </div>
                        <div><hr class="horizontal dark"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5 form-control">
                            <div class="row ">
                                
                                <!-- <div class="col-sm-3">
                                    @include('translation::forms.search', ['name' => 'filter', 'value' => Request::get('filter'), ])
                                </div> -->
                                <div class="col-sm-4">
                                    @include('translation::forms.select', ['name' => 'language', 'items' => $languages, 'submit' => true, 'selected' => $language])
                                </div>
                                <div class="col-sm-4">
                                    @include('translation::forms.select', ['name' => 'group', 'items' => $groups, 'submit' => true, 'selected' => Request::get('group'), 'optional' => true])                                    
                                </div>
                                <div class="col-sm-4 text-right">
                                    <a href="{{ route('languages.translations.create', $language) }}" class="btn btn-primary">
                                        {{ __('translation::translation.add') }}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(count($translations))
                        <div class="table-responsive mb-5 pt-3 ">
                            <table class="table align-items-center ">
                                <thead>
                                    <tr>
                                        <!-- <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.group_single') }}</th> -->
                                         <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.key') }}</th> 
                                        <th class="uppercase font-thin">{{ config('app.locale') }}</th>
                                        <th class="uppercase font-thin text-end">{{ $language }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($translations as $type => $items)
                                        @foreach($items as $group => $translations)
                                            @foreach($translations as $key => $value)
                                                @if(!is_array($value[config('app.locale')]))
                                                    <tr>
                                                        <!-- <td>{{ $group }}</td> -->
                                                         <td>{{ $key }}</td> 
                                                        <td>{{ $value[config('app.locale')] }}</td>
                                                        <td>
                                                            <translation-input  initial-translation="{{ $value[$language] }}" language="{{ $language }}" group="{{ $group }}" translation-key="{{ $key }}"  route="{{ config('translation.ui_url') }}">
                                                            </translation-input>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection