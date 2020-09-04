<?php 

namespace App\Repositories;

use App\Model\Category;
use App\Model\Type;
use App\Model\Service;
use Log;
use Session;

class HomeRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getCategory()
    {
    	try {
    		return  $query = Category::get();  
    	} catch(\Exception $err){
    		Log::error('message error in getCategory on HomeRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }
    public function getType()
    {
        try {
            return  $query = Type::with('service')->get();  
        } catch(\Exception $err){
            Log::error('message error in getType on HomeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
    public function getService()
    {
        try {
            return  $query = Service::get();  
        } catch(\Exception $err){
            Log::error('message error in getService on HomeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

   
    
}