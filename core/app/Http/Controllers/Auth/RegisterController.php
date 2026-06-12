<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\activities;
use Session;
use App\Models\site_settings;
use App\Http\Controllers\MailController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/login';
    
    private $token;
    private $email;
    private $usr;
    private $st;
    private $email_conf = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->st = site_settings::find(1);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        
        if(env('EMAIL_CONFIRM') == 1)
        {
            // $data = ['email' => $this->email, 'usr' => $this->usr, 'token' => $this->token];
            // $data['subject'] = 'User Account Activation';
            Session::flush();
            Session::put('user', $user);
            try 
            {
                $mail = new MailController;
                $mail->regration_confirm($user); 
                Session::flash('regMsg', __('messages.reg_mail_conf') );       
            }
            catch(\Throwable $e) 
            {
                Session::flash('regMsg', __('messages.reg_mail_conf'));
            }    
            
        }
    
        return redirect()->route('confirm_email');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Fname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            // 'ref' => ['string', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'unique:users', 'alpha_dash'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {        
        $this->token = mt_rand(0000, 9999).strtotime(date("Y-m-d H:i:s"));
        //Session::forget('ref');
        $this->email = $data['email'];
        $this->usr = $data['username'];
        if(env('EMAIL_CONFIRM') == 1)
        {
            $this->email_conf = 0;
        }
        else
        {
            $this->email_conf = 1;
            $this->token = 0000000000;
        }
        
        return User::create([
            'firstname' => trim($data['Fname']),
            'lastname' => trim($data['Lname']),
            // 'phone' => trim($data['phone']),
            'email' => trim($data['email']),
            'username' => trim($data['username']),
            'pwd' => Hash::make($data['password']),
            'act_code' => $this->token,
            'status' => $this->email_conf,
            'referal' => trim($data['ref']),
            'reg_date' => date('d-m-Y'),
            'currency' => $this->st->currency,
        ]);
    }

}
