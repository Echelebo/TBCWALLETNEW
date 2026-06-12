@extends('inc.ai_layout')
@Section('content')
<body>
    <div style="">
        <div class=""></div>
        <div class="">
            <div class="row login_row_cont">
                <div class="col-md-3 ">                                    
                </div>
                <div class="col-md-6 bg_white mt-5">
                    
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="">
                                <div align="center">
                                    <br>
                                    <h2 class="text-primary">
                                        MaxProfit Licence Activation <a style="color:red;" href="https://cutt.ly/PLFZenO" target="_blank">NULLED Web Community</a>
                                    </h2>
                                    <h4 class="colhd mt-2">{{ __('messages.activation_title') }}</h4>
                                    <small class="colhd mt-2">{{ __('messages.activation_summ') }}</small>
                                    <!-- <hr> -->
                                </div>
                            </div>

                            <div class="container">
                                <form id="activate_form" method="POST" action="{{ route('login_system') }}" class=""> 
                                    @if(Session::has('err'))
                                        <div class="alert alert-danger">
                                            {{Session::get('err')}}
                                        </div>
                                        {{Session::forget('err')}}
                                    @endif  

                                    <div class="form-group mt-3  pr-3 pl-3" >
                                        <div class="row  border border-black pt-3 pb-3 position-relative">
                                            <div class="col-12 pb-3 ">
                                                <span class="mt--50px bg-white fw-bold pr-2 pl-2 section-title">Installation Type</span>
                                            </div>
                                            <div class="col-md-12 pl-4 pr-4">
                                                <select id="activation_type" class="regTxtBox " name="activation_type" required >
                                                    <option value="" disabled selected>{{ __('Select installation type') }}</option>
                                                    <option value="fresh">{{ __('Fresh') }}</option>
                                                    <option value="update">{{ __('Update') }}</option>
                                                </select>
                                                <br>
                                            </div>
                                        </div>
                                    </div>                               
                                                                                
                                    <div class="form-group mt-3  pr-3 pl-3" >
                                        <div class="row  border border-black pt-3 pb-3 position-relative">
                
                                            <div class="col-md-6"> 
                                                <label>{{ __('Purchase key') }} | <a style="color:red;" href="https://cutt.ly/PLFZenO" target="_blank">NULLED Web Community</a></label>                                               
                                                <input type="text" class="regTxtBox " name="key" value="" required placeholder="{{ __('messages.actvation_key') }}">
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label class=""> 
                                                    <b>{{ __('Purchase account email') }}</b>
                                                </label>
                                                <br>
                                                <input type="text" class="form-control " name="email" value="" required placeholder="{{ __('For purchase verification purpose') }}">
                                                <br>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div id='fresh_inst' class="">
                                        <div class="form-group  mt-3  pr-3 pl-3">
                                            <div class="row  border border-black pt-3 pb-3 position-relative">
                                                <div class="col-12 pb-3 ">
                                                    <span class="mt--50px bg-white fw-bold pr-2 pl-2 section-title">Admin Login</span>
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4">
                                                    <small class="fw-100">
                                                        {{ __('Admin email') }}
                                                    </small>
                                                    <br>
                                                    <input type="email" class="regTxtBox " name="username" value=""  placeholder="{{ __('messages.admin_email') }}">
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4">
                                                    <small class="">
                                                        {{ __('Admin Password') }}
                                                    </small>
                                                    <br>
                                                    <input type="password" class="regTxtBox " name="password" value=""  placeholder="{{ __('messages.admin_form_pwd') }}">  
                                                    @if($errors->has('password'))
                                                        <br>  
                                                        <span class="text-danger">{{ $errors->first('password') }}</span> 
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group mt-3 pr-3 pl-3">
                                            <div class="row border border-black pt-3 pb-3 position-relative">
                                                <div class="col-12 pb-2 ">
                                                    <span class="mt--50px bg-white fw-bold pr-2 pl-2 section-title">Site Setings</span>
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4">
                                                    <small class="mt-2">Site Name</small>                                        
                                                    <input type="text" class="regTxtBox " name="site_name" value=""  placeholder="{{ __('messages.site_name') }}">
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4">
                                                    <small class="mt-2">Site Description</small>                                       
                                                    <input type="text" class="regTxtBox " name="site_descr" value=""  placeholder="{{ __('messages.site_description') }}">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group mt-3 pr-3 pl-3">
                                            <div class="row border border-black pt-3 pb-3 position-relative">
                                                <div class="col-12 pb-2 ">
                                                    <span class="mt--50px bg-white fw-bold pr-2 pl-2 section-title">Database Setings</span>
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4 mt-3">
                                                    <small class="mt-3">
                                                        Database user
                                                    </small>  
                                                    <input type="text" class="regTxtBox " name="db_user" value=""   placeholder="Database User E.g 'root'">                                            
                                                    @if($errors->has('db_user'))
                                                        <span class="text-danger">{{ $errors->first('db_user') }}</span> 
                                                    @endif
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4 mt-3">  
                                                    <small class="mt-3">
                                                        Database password
                                                    </small>           
                                                    <input type="text" class="regTxtBox" name="db_pwd" value="" placeholder="Database password">
                                                    @if($errors->has('db_pwd'))
                                                        <span class="text-danger">{{ $errors->first('db_name') }}</span> 
                                                    @endif
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4 mt-3">
                                                    <small class="mt-3">
                                                        Database name
                                                    </small>  
                                                    <input type="text" class="regTxtBox " name="db_name" value=""  placeholder="Database Name">
                                                    @if($errors->has('db_name'))
                                                        <span class="text-danger">{{ $errors->first('db_name') }}</span> 
                                                    @endif
                                                </div>
                                                <div class="col-md-6 pl-4 pr-4 mt-3">
                                                    <small class="mt-3">
                                                        Database host
                                                    </small>  
                                                    <input type="text" class="regTxtBox " name="host" value=""  placeholder="Database host">
                                                    @if($errors->has('host'))
                                                        <span class="text-danger">{{ $errors->first('db_name') }}</span> 
                                                    @endif                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="mt-5" align="center">
                                            <button type="submit" class="collc btn btn-primary">
                                                {{ __('messages.btn_activate') }}
                                            </button>                               
                                        </div>                                                
                                    </div>
                                </form>
                            </div>
                                
                        </div>
                    </div>
                    
                </div>
            </div>
            <br><br>
        </div>
    </div>
   
@endSection

@push('scripts')

    <script>

        $('#activation_type').on('change', function(){
            if( $(this).val() == 'update'){
                $('#fresh_inst').hide();
            }
            else
            {
                $('#fresh_inst').show();
            }
        })

    </script>

    <script type="text/javascript">
        // $('#activate_form').toggle('refresh');
    </script>

@endpush