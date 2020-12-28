<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($language)
    {
        if ($language) {
            session()->put('language', $language);
        }

        return redirect()->back();
    }
}
