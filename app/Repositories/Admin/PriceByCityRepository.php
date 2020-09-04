<?php 

namespace App\Repositories\Admin;

use App\Model\PriceByCity;
use App\Model\Service;
use App\Model\ServicePlan;
use App\Model\State;
use App\Model\City;
use Log;
use Session;
use File;


class PriceByCityRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getServicePlan($request)
    {
        try {
            $service_plan_ids=ServicePlan::where(['category_id'=>$request->category_id, 'sub_category_id'=>$request->sub_category_id, 'service_id'=>$request->service_id])->pluck('name','id')->toArray();
            return $service_plan_ids;
        } catch(\Exception $err){
            Log::error('message error in getServicePlan on PriceByCityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function getAllPriceByCity($request)
    {
    	try {
    		$query = PriceByCity::withTrashed()->where(['city_id'=>$request->city_id, 'service_id'=>$request->service_id])->pluck('amount','service_plan_id')->toArray();  
            return $query;
    	} catch(\Exception $err){
    		Log::error('message error in getAllPriceByCity on PriceByCityRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }

    
    /**
    * Method to update resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function update($request)
    {
        try {
            $price_by_city  = PriceByCity::where(['service_plan_id'=>$request->service_plan_id, 'city_id'=>$request->city_id])->first(); //Fetch PriceByCity data
            if(isset($price_by_city->id)){
                $price_by_city->amount = $request->amount;
            }else{
                $price_by_city =new PriceByCity();
                $price_by_city->state_id = $request->state_id;
                $price_by_city->city_id = $request->city_id;
                $price_by_city->service_id = $request->service_id;
                $price_by_city->service_plan_id = $request->service_plan_id;
                $price_by_city->amount = $request->amount;
            }

            if ($price_by_city->save()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on PriceByCityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    

    public function getPriceByCity($category_id)
    { 
        try { 
            $price_by_city_ids=PriceByCity::distinct()->where('category_id',$category_id)->get()->pluck('name', 'id');
            return $price_by_city_ids;
        } catch(\Exception $err){
            Log::error('message error in getPriceByCity on PriceByCityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
}