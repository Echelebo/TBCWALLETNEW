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

class flutter extends Controller
{
    public function flutter_payment(Request $req)
    {
        try{
            
            $st = site_settings::find(1);
            $user = User::find($req['user_id']);
            $paymt = new deposits;
            $paymt->user_id = $user->id;
            $paymt->usn = $user->username;
            $paymt->amount = floatval($req['amt']) * env('CONVERSION');
            $paymt->currency = $st->currency;
            $paymt->account_name = $user->firstname;
            $paymt->account_no = $req['transaction_id'];
            $paymt->bank = 'Flutterwave';
            $paymt->invoice = $req['transaction_id'].'_'.$user->id.'_'.$user->username;
            
            if($req['status'] == 'successful')
            {
                $paymt->status = 1;
                $paymt->on_apr = 1;
                $user->wallet += floatval($req['amt']) * env('CONVERSION');
                $user->save();
            }
            else
            {
                $paymt->status = 0;
                $paymt->on_apr = 0;
            }
            
            $paymt->pop = $req['tx_ref'];
            $paymt->save();
            
            return redirect()->route('wallet', $user->username)->with([
                  'toast_msg' => __('messages.dpst_succ'),
                  'toast_type' => 'suc'
            ]);
        }
        catch(\Exception $e)
        {
            return redirect()->route('wallet', $user->username)->with([
                  'toast_msg' => __('messages.err_cdr_act'),
                  'toast_type' => 'err'
            ]);
        }
    }

}