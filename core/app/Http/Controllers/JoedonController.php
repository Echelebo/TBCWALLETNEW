<?php

namespace JoeDixon\\Translation\\Http\\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller;
use JoeDixon\Translation\Drivers\Translation;
use JoeDixon\Translation\Http\Requests\LanguageRequest;

use File;
use Session;
use Alert;

class JoedonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function getLanguages() {
        $languages = $this->translation->allLanguages();
        return $languages;
    }

}
