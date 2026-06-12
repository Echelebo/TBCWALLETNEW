<?php
    $user = Auth::User();  
    $myInv = App\Models\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\Models\investment::where('user_id', $user->id)->where('status', 'Active')->orderby('id', 'desc')->get();
    $refs = App\Models\User::where('referal', $user->username)->get();
    $wd = App\Models\withdrawal::where('user_id', $user->id)->get();
?>