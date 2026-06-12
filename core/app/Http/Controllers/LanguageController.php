<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
// use JoeDixon\Translation;

use File;
use Session;
use Alert;

class LanguageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    private $translation;

    public function __construct()
    {
        // $this->translation = new Translation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */





    public function defaultChange($locale)
    {
        Session::put('locale', $locale);
        toast()->success(__('messages.locale_changed_suc'));
        return redirect()->back();
    }

    public function deleteLanguage($locale)
    {
        // unlink('resources/lang/'.$request->langVal.".json");
        if($locale == 'en')
        {
            toast()->error(__('messages.locale_changed_suc'));
            return back();
        }
        if (file_exists(base_path('resources/lang/'.$locale.".json"))) {
            unlink( base_path('resources/lang/'.$locale.".json") );
        }
        File::deleteDirectory( base_path('resources/lang/'.$locale ) );
        toast()->error(__('messages.lang_deleted'));
        return back();
    }

    

}
