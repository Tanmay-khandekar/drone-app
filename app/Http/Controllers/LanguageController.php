<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;

class LanguageController extends Controller
{
    
    public function index()
    {
        //
        $language = Language::where('language_code', 'en')->get();
        return response(['data' => $language], 200);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                    'field_key' =>  'required',
        ]);
        $params=$request->all();
        
        if ($validator->passes() ) {
            foreach($params['content'] as $conKey => $content){
                $language = new Language;
                $language->field_key     = $params['field_key'];
                $language->content       = $content;
                $language->language_code = $conKey;
                $language->save();
            }
            return response()->json(['success' => 'Language saved successfully.']);
        }else{
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'field_key' =>  'required',
        ]);
        $params=$request->all();

        if ($validator->passes() ) {
            $languages = Language::where('field_key', $params['field_key'])->get();
            if($languages){
                foreach($params['content'] as $conKey => $content){
                    
                    $language = Language::where('language_code', $conKey)
                    ->where('field_key', $params['field_key'])->update([
                        'content' => $content,
                        'language_code'=>$conKey,
                    ]);

                }
            }
        }
        return response()->json(['success' => 'Language Update successfully.']);
    }

    public function edit($key)
    {
        $languages = Language::where('field_key', $key)->get();
        $content = [];
        $language = new Language;
        $language->field_key = $languages[0]['field_key'];
        foreach ($languages as $LangKey => $LangValue) {
           $content[$LangValue->language_code] = $LangValue->content;
        }
        $language->content = $content;
        return response(['data' => $language], 200);
    }
    
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }    

}