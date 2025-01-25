<?php

namespace App\Http\Controllers;

use App\Services\ThemeService;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    protected $themeService;

    public function __construct(ThemeService $themeService)
    {
        $this->themeService = $themeService;
    }

    public function switchTheme(Request $request)
    {
        $theme = $request->input('theme');
        
        if ($this->themeService->setTheme($theme)) {
            return redirect()->back()->with('success', 'Theme changed successfully');
        }
        
        return redirect()->back()->with('error', 'Invalid theme selected');
    }
}