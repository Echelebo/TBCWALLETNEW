<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

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
use Paystack;

use GuzzleHttp\Client as GuzzleClient;
use DotenvEditor;
use Alert;

class aiController extends Controller
{

  public function login_system(Request $req)
  { 

    Validator::extend('without_spaces', function($attr, $value){
        return preg_match('/^\S*$/u', $value);
    });

    $req->validate(
    [ 
      'activation_type' =>  'required',
      'key'   =>  'required',
    ]);

    if ( $req['activation_type'] == 'fresh' ) {
      
      $req->validate(
        [
          
          'username'  =>  'required|email',
          'password' => 'required|min:6',
          'db_user' => 'required|without_spaces',
          'db_name' => 'required|without_spaces',
          'host'    =>    'required|without_spaces',
          'site_name'    =>    'required',
          'site_descr'    =>    'required',
          'activation_type' =>  'required',
          'key'   =>  'required',
          'email' => 'required|email',
        ],
        [

          'db_user.without_spaces' => __('messages.white_space_db_usr'),
          'db_name.without_spaces' => __('messages.white_space_db_name'),
          'host.without_spaces' => __('messages.white_space_db_name')
        ]
      );

      try
      {
       
        $domain = request()->getHost();
        $data = json_encode( array(
            'key' => $req['key'],
            'url' => $domain,
            'email' =>  $req['email'],
        ));      
          $pwdd = Hash::make($req['password']);
          
          // if ( $req['activation_type'] == 'fresh' ) {

          $pwdd = Hash::make($req['password']);
          $res=load_db_tables($req['host'], $req['db_user'], $req['db_pwd'], $req['db_name'], $req['username'], $pwdd, $req['site_name'], $req['site_descr']); 
          
          if($res != 'suc') 
          {
            return back()->with(['err' => $res]);
          }  

          // }
          
          $file = DotenvEditor::setKeys([
              [
                'key'     => 'VARIABLE_KEY',
                'value'   => $req['key']
              ], 
              [
                'key'     => 'APP_NAME',
                'value'   => $req['site_name']
              ],
              [
                'key'     => 'APP_DESCR',
                'value'   => $req['site_descr']
              ],
              [
                'key'     => 'APP_URL',
                'value'   => $domain
              ],
              [
                'key'     => 'DB_DATABASE',
                'value'   => $req['db_name']
              ],
              [
                'key'     => 'DB_USERNAME',
                'value'   => $req['db_user']
              ],
              [
                'key'     => 'DB_PASSWORD',
                'value'   => $req['db_pwd']
              ],
              [
                'key'     => 'MAIL_HOST',
                'value'   => $req['host']
              ]
            
          ]);

          $file->save();
          DotenvEditor::deleteBackups();
          $file_cont = json_encode(
            array(
                'key' => $req['key'],
                'url' => Hash::make($domain)
            )
          );

          \Storage::put('file.txt', $file_cont);
          toast()->success('Script installed Successfully NULLCAVE.club');
          return redirect()->route('mail_settings');
      }
      catch(\Exception $e)
      {
        return back()->with(['err' => __('messages.act_err_key2' . $e->getMessage())]); 
      }
    }


    if ( $req['activation_type'] == 'update' ) { 
      
      try
      {

        $domain = request()->getHost();
        $url = 'https://demo.mcode.me/coinpayment/confirm/a'; 
        $data = json_encode( array(
            'key' => $req['key'],
            'url' => $domain,
            'email' =>  $req['email'],
        ));      
        $client = new GuzzleClient;
        $r = $client->request('POST', $url, [
           'headers' => [
                'Content-Type' => 'application/json',
           ],
           'body' => $data
        ]);
        
        $response = json_decode($r->getBody()->getContents());

        // dd($response);

        if(isset($response->resp) && $response->resp == 'ok')
        { 

            $res=update_db_tables( trim(env('DB_HOST')), trim(env('DB_USERNAME')), env('DB_PASSWORD'), trim(env('DB_DATABASE')) ); 

            if($res != 'suc') 
            {
                return back()->with(['err' => $res]);
            } 

            // DotenvEditor::addEmpty();

            $file = DotenvEditor::setKeys([
                [
                    'key'     => 'VARIABLE_KEY',
                    'value'   => $req['key']
                ],             
            
            ]);

            $file->save();
            // DotenvEditor::deleteBackups();
            $file_cont = json_encode(
                array(
                    'key' => $req['key'],
                    'url' => Hash::make($domain)
                )
            );

            \Storage::put('file.txt', $file_cont);
            toast()->success('Script Updated Successfully');
            return redirect('/admin');

        }

        if(isset($response->resp) && $response->resp == 'diff_domain')
        {
          return back()->with(['err' => __('messages.key_u_dif_d')]);
        }

        if(isset($response->resp) && $response->resp == 'not_found')
        {
          return back()->with(['err' => __('messages.act_key_nt_fnd')]);
        }
        
        return back()->with(['err' => __('messages.check_act_key')])  ;

      }
      catch(\Throwable $e){

        return back()->with( [ 'err' => $e->getMessage() ] );
        
      } 

    }
    
  }

  public function mail_settings()
  {
    return view('auth.smtp');
  }

  public function mail_settings_save(Request $req)
  {
    
    $file = DotenvEditor::setKeys([
      [
          'key'     => 'MAIL_DRIVER',
          'value'   => $req['mail_driver']
      ],              
      [
          'key'     => 'MAIL_HOST',
          'value'   => $req['mail_host']
      ],
      [
          'key'     => 'MAIL_PORT',
          'value'   => $req['mail_port']
      ],
      [
          'key'     => 'MAIL_USERNAME',
          'value'   => $req['mail_user']
      ],
      [
          'key'     => 'MAIL_PASSWORD',
          'value'   => $req['mail_password']
      ],
      [
          'key'     => 'MAIL_ENCRYPTION',
          'value'   => $req['mail_encrypt']
      ]
      
    ]);
    $file = DotenvEditor::save();

    return redirect('/admin');
  }

}