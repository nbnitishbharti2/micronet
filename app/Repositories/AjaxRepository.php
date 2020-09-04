<?php 

namespace App\Repositories;

use App\Model\City;
use App\Model\State;
use Log;
use Session;

class AjaxRepository 
{

   public function getCity($state_id)
    {
        try {  
            $city_ids=City::where(['state_id'=>$state_id])->pluck('name', 'id');
            return $city_ids;
        } catch(\Exception $err){
            Log::error('message error in getCity on AjaxRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
}