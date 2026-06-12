@php($page_title = __('messages.Sttng'))
@extends('translation::layout')
@section('body')
    <div class="main-panel pl-4 mt-5">
        <div class="content mt-5 d-flex flex-row align-items-center justify-content-center">  
                <div class="card col-sm-6 p-4 shadow-lg">
                    <div class="card-head py-3">
                       <h5 class="text-primary">{{ __('translation::translation.add_language') }}</h5> 
                       <hr class="horizontal dark">
                    </div>
                    <form action="{{ route('languages.store') }}" method="POST">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="">
                                <div class="col-12">
                                    <div class="form-group ">
                                        <label>{{__('translation::translation.language_name')}}</label>
                                        <input type="text" name="name" class="form-control" value="" required placeholder="Ex: English">
                                    </div>
                                    <div class="form-group ">
                                        <label>{{__('translation::translation.locale')}}</label>
                                        <input type="text" name="locale" class="form-control" value="" required placeholder="Ex: en">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="card-footer d-flex justify-content-between mt-3">
                            <button class="btn btn-primary">
                                {{ __('translation::translation.save') }}
                            </button>

                            <a class="text-right btn border text-primary" href="{{ route('languages.index') }}">
                                {{ __('messages.go_back') }}
                            </a>
                        </div>
                    </form>

                </div>
        </div>
    </div>
@endsection