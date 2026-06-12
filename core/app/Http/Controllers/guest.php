<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\states;
use App\Models\country;
use Session;
use Hash;
use File;
use Auth;
use App\User;
use App\Models\banks;
use App\Models\activities;
use App\Models\packages;
use App\Models\investment;
use App\Models\msg;
use App\Models\admin;
use App\Models\deposits;
use App\Models\withdrawal;
use App\Models\adminLog;
use App\Models\xpack_inv;
use Validator;
use App\Models\site_settings;

class guest extends Controller
{
    public function guest_msg(Request $req)
    {
        try{
            // dd('here');
            $maildata =  $req->all();
            Mail::send('mail.contact', ['md' => $req->all()], function($msg) use ($maildata){
                $msg->from($maildata['email']);
                $msg->to(env('SUPPORT_EMAIL'));
                $msg->subject($maildata['subject']);
            });
            
            return back()->with([
                  'toast_msg' => '',
                  'toast_type' => 'suc'
            ]);
            
        }
        catch(\Exception $e)
        {
            return back()->with([
                  'toast_msg' => '',
                  'toast_type' => 'err'
            ]);
        }
    }

}