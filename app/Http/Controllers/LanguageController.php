<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        session()->put('locale', $locale);
        App::setLocale($locale);

        // Redirect back to the previous page or a specific route
        return redirect()->back();
    }
}
