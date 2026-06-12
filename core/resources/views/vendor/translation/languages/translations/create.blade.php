@php($page_title = __('messages.Sttng'))
@extends('translation::layout')
@section('body')
     <main class="main-content position-relative  border-radius-lg ">
        <div class="container-fluid py-4 ">
            @include('admin.atlantis.main_bar')
            <div class="card">
                <div class="panel-header d-flex flex-row">
                    <div class="col">
                        <h5 class="text-primary w-80">{{ __('translation::translation.add_translation') }}</h5>
                    </div>
                    <div class="col text-end">
                        <a class="ms-2 btn btn-dark" href="{{ route('languages.index') }}">
                            <i class="fa fa-arrow-left"></i> {{__('messages.go_back') }}
                        </a>
                    </div>
                </div>

                <form action="{{ route('languages.translations.store', $language) }}" method="POST">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body p-4">
                            @include('translation::forms.text', ['field' => 'group', 'label' => __('translation::translation.group_label'), 'placeholder' => __('translation::translation.group_placeholder')])
                            
                            @include('translation::forms.text', ['field' => 'key', 'label' => __('translation::translation.key_label'), 'placeholder' => __('translation::translation.key_placeholder')])

                            @include('translation::forms.text', ['field' => 'value', 'label' => __('translation::translation.value_label'), 'placeholder' => __('translation::translation.value_placeholder')])
                            <div class="input-group">
                                <button v-on:click="toggleAdvancedOptions" class="text-blue">{{ __('translation::translation.advanced_options') }}</button>
                            </div>

                            <div v-show="showAdvancedOptions">
                                @include('translation::forms.text', ['field' => 'namespace', 'label' => __('translation::translation.namespace_label'), 'placeholder' => __('translation::translation.namespace_placeholder')])
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-end p-4">
                        <button class="btn btn-primary">
                            {{ __('translation::translation.save') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </main>
@endsection