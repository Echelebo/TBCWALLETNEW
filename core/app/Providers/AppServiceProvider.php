<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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
use App\Models\kyc;
use App\Models\lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Using Closure based composers...
        
        View::composer('*', function ($view) {
            $user = Auth::User();
            $adm = Session::get('adm');
            $route = Route::current();

            // if(App::getLocale() == null){
            //     App::setLocale('en');
            //     Session::put('locale', 'en');
            // }
            
            if($route)
            {
                if($route->getName() == 'homelogin' || $route->getName() == 'mail_settings' || $route->getName() == "login_system")
                {
                   
                } 
                else
                {
                    $settings = site_settings::find(1);
                    $lang = lang::all();
                        
                    if(!empty($user))
                    {
                        Session::forget('adm');
                        $adm = null;
                        $myInv = investment::where('user_id', $user->id)->orderby('id', 'asc')->paginate(10);
                        $actInv = investment::where('user_id', $user->id)->where('status', 'Active')->orderby('id', 'desc')->paginate(10);
                        $refs = User::where('referal', $user->username)->orderby('id', 'desc')->get();
                        $wd = withdrawal::where('user_id', $user->id)->orderby('id', 'asc')->get();
                        $logs = activities::where('user_id', $user->id)->where('action', 'wallet_wd')->orwhere('action', 'deposit')->orwhere('action', 'invest')->orwhere('action', 'ref_bn_wd')->orderby('id', 'desc')->take(5)->get();
                        $mybanks = banks::where('user_id', $user->id)->where('Account_name', '!=', 'BTC')->orderby('id', 'desc')->get();
                        $my_wallets = banks::where('user_id', $user->id)->where('Account_name', 'BTC')->orderby('id', 'desc')->get();
                        // $settings = site_settings::find(1); 
                        $kyc = kyc::where('user_id', $user->id)->get();     
                        
                        $view->with([
                            'user' => $user, 
                            'myInv' => $myInv, 
                            'actInv' => $actInv, 
                            'refs' => $refs, 
                            'wd' => $wd, 
                            'logs' => $logs, 
                            'mybanks' => $mybanks, 
                            'my_wallets' => $my_wallets, 
                            'settings' => $settings, 
                            'lang' => $lang,
                            'kyc' => $kyc
                        ]); 
    
                    }
                    elseif (!empty($adm))
                    {
                        Session::put('adm', $adm);
                        $user = null;
                        $inv = investment::orderby('id', 'desc')->get();
                        $deposits = deposits::orderby('id', 'desc')->get();
                        $users = User::orderby('id', 'desc')->get();
                        $wd = withdrawal::orderby('id', 'desc')->get();
                        $today_wd = withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
                        $today_dep = deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
                        $today_inv = investment::where('date_invested', date('Y-m-d'))->orderby('id', 'desc')->get();
                        $cap = $cap2 = $dep = $dep2 = $wd_bal = $sum_cap = 0; 
                        $logs =  adminLog::orderby('id', 'desc')->take(5)->get();
                        $kyc = kyc::get(); 
                        
                        $view->with([
                            'inv' => $inv, 
                            'deposits' => $deposits, 
                            'users' => $users, 
                            'wd' => $wd, 
                            'today_wd' => $today_wd, 
                            'today_dep' => $today_dep, 
                            'today_inv' => $today_inv, 
                            'settings' => $settings,
                            'logs' => $logs,
                            'cap' => $cap,
                            'cap2' => $cap2,
                            'dep' => $dep,
                            'dep2' => $dep2,
                            'wd_bal' => $wd_bal,
                            'sum_cap' => $sum_cap,
                            'adm' => Session::get('adm'),
                            'lang' => $lang,
                            'kyc' => $kyc
                        ]); 
                        
                    }
                    else
                    {
                        $view->with(['lang' => $lang, 'settings' => $settings]);
                    }
                }
            }   
            
        });
    }
}
