<?php 

namespace App\Repositories;

use App\Model\Booking;
use Log;
use Session;
use File;
use Auth;

class MyOrdersRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllMyOrders()
    {
    	try {
    		return  $query = Booking::with(['state','city','service','service_plan'])->where('user_id',Auth::user()->id)->withTrashed()->paginate(10);  
    	} catch(\Exception $err){
    		Log::error('message error in getAllMyOrders on MyOrdersRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }

    

    
}