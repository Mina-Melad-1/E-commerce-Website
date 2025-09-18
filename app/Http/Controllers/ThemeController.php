<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    public function toggleTheme(Request $request)
    {
        $currentTheme = Cookie::get('theme', 'light');
        $newTheme = $currentTheme === 'light' ? 'dark' : 'light';
        
        // Set cookie for 1 year (525600 minutes)
        return redirect()->back()->cookie('theme', $newTheme, 525600);
    }
}