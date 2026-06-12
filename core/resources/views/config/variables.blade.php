<?php
    $user = Auth::User();  
    $settings = App\Models\site_settings::find(1);
    
    $myInv = App\Models\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\Models\investment::where('user_id', $user->id)->where('status', 'Active')->orderby('id', 'desc')->get();
    
    $refs = App\Models\ref::where('username', $user->username)->orderby('id', 'desc')->get();
    $wd = App\Models\withdrawal::where('user_id', $user->id)->get();
    $logs = App\Models\activities::where('user_id', $user->id)->get();
    
    $mybanks = App\Models\banks::where('user_id', $user->id)->get();
    
    
?>