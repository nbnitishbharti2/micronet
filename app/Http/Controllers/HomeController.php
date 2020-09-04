<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HomeRepository; 
use App\Model\Setting; 
use Auth;
use Log;
use App;
use Session;
use Helper;



class HomeController extends Controller
{
    
    public function __construct(HomeRepository $home)
    {
        $this->home = $home;
        $this->middleware('auth',['except' => 'index']);
    }

    /**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        try {
            $data['category'] = $this->home->getCategory(); // Fetch all category data
            $data['type'] = $this->home->getType(); // Fetch all type data
            $data['service'] = $this->home->getService(); // Fetch all service data
            return view('home.index', $data);
        } catch(\Exception $err){
            Log::error('Error in index on HomeController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
   
    
    public function dashboard()
    {
        try {
            // have no connection with repository
            return view('home.dashboard');
        } catch(\Exception $err){
            Log::error('Error in index on HomeController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
        
    }
  
    
}
