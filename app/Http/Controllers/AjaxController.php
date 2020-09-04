<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AjaxRepository; 
use App\Model\State; 
use App\Model\City; 
use Log;
use App;
use Session;
use Helper;



class AjaxController extends Controller
{
    
    public function __construct(AjaxRepository $ajax)
    {
        $this->ajax = $ajax;
    }

    /**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
    public function getCity(Request $request)
    {
        try {
            //dd($request);
            $data = $this->ajax->getCity($request->state_id);
            return json_encode($data);
        } catch(\Exception $err){
            Log::error('Error in getCity on AjaxController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
    
  
    
}
