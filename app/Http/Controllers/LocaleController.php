<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function change(Request $request)
    {
        $locale = $request->input('locale');
        if (in_array($locale, config('app.locales'))) {
            session()->put('locale', $locale); 
        }
        // dd(session('locale'));

        return redirect()->back();
    }
    
    public function changes(Request $request, $lang)
    {
        $locale = $lang;
        if (in_array($locale, config('app.locales'))) {
            session()->put('locale', $locale); 
        }
        // dd(session('locale'));

        return redirect()->back();
    }
}
