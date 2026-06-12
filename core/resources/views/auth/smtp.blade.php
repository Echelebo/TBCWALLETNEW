
@extends('inc.ai_layout')
@section('content')
<body>
    <div style="">
        <div class=""></div>
        <div class="">
            <div class="row login_row_cont">
                <div class="col-md-3 ">                                    
                </div>
                <div class="col-md-6 bg_white mt-5">
                    
                    <div class="row">
                        <div class="col-md-12 " >
                            <div style="">                        
                                <div class="">
                                    <div class="">
                                        <div align="center">
                                            <br>
                                            <div class="alert alert-success">
                                                {{__('messages.act_suc')}}
                                            </div>
                                            
                                            <h4 class="colhd mt-2">{{ __('messages.mail_settings') }}</h4>
                                            <!-- <hr> -->
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <form method="POST" action="{{ route('mail_settings_save') }}" class=""> 
                                            <div class="form-group row" >
                                                <div class="col-md-6">
                                                    
                                                    <input type="text" class="regTxtBox " name="mail_host" value="" required placeholder="{{ __('messages.mailing_host') }}">
                                                    <br>
                                                    <input type="text" class="regTxtBox activation_txtBox" name="mail_user" value="" required placeholder="{{ __('messages.mailing_username') }}">
                                                    <br>
                                                    <input type="password" class="regTxtBox activation_txtBox" name="mail_password" value="" required placeholder="{{ __('messages.mailing_pwd') }}">  
                                                    <br>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control">
                                                              <input required type="radio" name="mail_driver" value="smtp" />
                                                              {{ __('messages.mailing_smtp') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-control">
                                                                <input required type="radio" name="mail_driver" value="mail" />
                                                                {{ __('messages.mailing_mail') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="number" class="regTxtBox activation_txtBox2" name="mail_port" value="" required placeholder="{{ __('messages.mailing_port') }}">
                                                    <br>
                                                    <input type="text" class="regTxtBox activation_txtBox" name="mail_encrypt" value="" required placeholder="{{ __('messages.mailing_encrypt') }}">
                                                    
                                                </div>
                                            </div>                                          
                                            

                                            <div class="mb-5">
                                                <div class="mt-5" align="center">
                                                    <button type="submit" class="collc btn btn-primary">
                                                        {{ __('Save') }}
                                                    </button>                               
                                                </div>                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br><br>
        </div>
    </div>
   
@endsection
