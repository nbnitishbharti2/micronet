<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
class SiteController extends Controller
{
    
    public function index()
    {
        # code...
    }
    
    /**
    *
    **/
    public function blog()
    {
        try {
            return view('home.blog');
        } catch(\Exception $err){
            Log::error('Error in blog on HomeController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    *
    **/
    public function about()
    {
        try {
            return view('about');
        } catch(\Exception $err){
            Log::error('Error in about on SiteController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
}
