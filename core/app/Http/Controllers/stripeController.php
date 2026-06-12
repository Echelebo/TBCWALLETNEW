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

use Stripe;

class stripeController extends HomeController
{
    private $st;
    private $stripe_token;
    private $amt;
    
    public function __construct()
    {
        parent::__construct(); 
        $this->st = site_settings::find(1);
    }

    public function stripe(Request $req)
    {
        $user = Auth::User();
        if($req->input('amt') < env('MIN_DEPOSIT'))
        {
            return back()->With(['toast_msg' => __('messages.amt_mb_grt').' '.env('MIN_DEPOSIT').' '.$this->st->currency, 'toast_type' => 'err']);
        }
        if(empty($user) )
        {
            return redirect('/');
        }
        return view('user.stripe', ['settings' => $this->st, 'amt' => $req->input('amt')]);

    }

    public function stripeAmount()
    {
        $user = Auth::User();
        if( empty($user) )
        {
            return redirect('/');
        }
        return view('user.stripe_payment', ['settings' => $this->st]);
    }

  
    public function stripeSubmit(Request $request)
    {
        
        $user = Auth::User();
        if(empty($user))
        {
            return redirect('/');
        }
        
        $this->amt = $request->input('amt');

        Stripe\Stripe::setApiKey($this->st->stripe_secret);

        $charge = Stripe\Charge::create ([

            "amount" => ($request->input('amt')*env('CONVERSION')),

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Payment from ". $this->st->site_title

        ]);

        if($charge)
        {
            $paymt = new deposits;
            $paymt->user_id = $user->id;
            $paymt->usn = $user->username;
            $paymt->amount = $request->input('amt')*env('CONVERSION');
            $paymt->currency = $this->st->currency;
            $paymt->account_name = $charge->payment_method;
            $paymt->account_no = $charge->id;;
            $paymt->bank = 'Stripe';
            $paymt->status = 1;
            $paymt->on_apr = 1;
            $paymt->pop = $request->stripeToken; //$request->stripeToken;

            $paymt->save();
            $user->wallet += $this->amt * env('CONVERSION');
            $user->save();

            $maildata = ['email' => $user->email, 'username' => $user->username];

            Mail::send('mail.user_deposit_notification', ['md' => $maildata], function($msg) use ($maildata){
                $msg->from(env('MAIL_USERNAME'), env('APP_NAME'));
                $msg->to($maildata['email']);
                $msg->subject( __('messages.usr_dpt_not') );
            });

            Mail::send('mail.admin_deposit_notification', ['md' => $maildata], function($msg) use ($maildata){
                $msg->from(env('MAIL_USERNAME'), env('APP_NAME'));
                $msg->to(env('SUPPORT_EMAIL'));
                $msg->subject( __('messages.usr_dpt_not') );
            });

            Session::flash('success', __('messages.paymt_suc') );
            return redirect()->route('stripe.amount');
        }
        else
        {
            Session::flash('p_failed', __('messages.pymt_nt_suc') );
            return redirect()->route('stripe.amount');
        }
       
    }

}