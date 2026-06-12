<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

use App\Models\site_settings;
use Session;
use GuzzleHttp\Client as GuzzleClient;
use DotenvEditor;

class MailController extends Controller
{

   protected $st;

   public function __construct()
   {
      $this->st = site_settings::find(1);
   }

   public function regration_confirm($user)
   {
      if(Session::has('user'))
      {
         $user = Session::get('user');
      }
      $transport = Transport::fromDsn(env('MAILER_DSN'));
      $mailer = new Mailer($transport);
      $email = (new Email())
                ->from(env('MAIL_SENDER'))
                ->to($user->email)
                ->subject('User registration confirmation')
                ->html(
                    
                    '<div class="row">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <div style="background-color: #FFF; width: auto; max-width: 700px; margin: auto; padding:5%;">
                                 <div style="border-left: 2px solid #EEE; border-right: 2px solid #EEE;">
                                    <div style="text-align: center; background-color: '.$this->st->header_color.'; color: #FFF; padding: 30px; font-size: 30px; font-weight: bold;">
                                          '.$this->st->site_title.' 
                                    </div>
                                    <div style="padding: 10px;">
                                       <h3 style="margin-top: 20px;">'.__('messages.hi').' '.$user->username.'</h3>
                                       <p>
                                           '. __('messages.reg_str_msg').' <a href="'. env('APP_URL'). '"><b>'.env('APP_NAME').'</b></a>
                                           <br>
                                           '.__('messages.reg_msg_cont').
                                           '<br><br>
                                       </p>
                                       <a style="margin-top: 15px; padding: 10px; background-color: '.$this->st->header_color.'; color: #FFF; text-decoration: none; border-radius: 20px;" href="'.env('APP_URL').'/registration/confirm/'.$user->username.'/'.$user->act_code.'">
                                               <b>'.__('messages.confirm_reg').'</b>
                                       </a>
                                    </div>
                                    <div style="text-align: center; background-color: #CCC; color: '.$this->st->header_color.'; padding: 10px; font-size: 12px; margin-top: 50px;">
                                            '.env('APP_NAME').' &copy; '.date('Y'). '
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>'
      );
      $mailer->send($email);
      return;
   }

   public function regration_confirm_resend()
   {
      if(Session::has('user'))
      {
         $user = Session::get('user');
         $this->regration_confirm($user);
         return back()->with(['toast_msg' => __('messages.email_resent')]);
      }
      else
      {
         return back()->with(['toast_msg' => __('messages.email_exp')]);
      }
   }

}