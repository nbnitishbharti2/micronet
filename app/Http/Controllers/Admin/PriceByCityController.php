<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\PriceByCityRepository;
use App\Http\Requests\Admin\PriceByCityRequest;
use App\Model\PriceByCity;
use App\Model\Service;
use App\Model\ServicePlan;
use App\Model\State;
use App\Model\City;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class PriceByCityController extends Controller
{
   	public function __construct(PriceByCityRepository $price_by_city)
	{
		$this->price_by_city = $price_by_city;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */

	public function index(Request $request)
	{
		try {
		    
			$data['service_plan'] = $this->price_by_city->getServicePlan($request); // Fetch all service plan data

			$data['price_by_city'] = $this->price_by_city->getAllPriceByCity($request); // Fetch all price by city data

			$data['city_id']=$request->city_id;
			$data['state_id']=$request->state_id;

			$data['category_id']=$request->category_id;
			$data['sub_category_id']=$request->sub_category_id;
			$data['service_id']=$request->service_id;
			
			return view('admin.price_by_city.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on PriceByCityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(Request $request)
	{
		try {

			$result = $this->price_by_city->update($request);

			$data['service_plan'] = $this->price_by_city->getServicePlan($request); // Fetch all service plan data

			$data['price_by_city'] = $this->price_by_city->getAllPriceByCity($request); // Fetch all price by city data

			$data['city_id']=$request->city_id;
			$data['state_id']=$request->state_id;

			$data['category_id']=$request->category_id;
			$data['sub_category_id']=$request->sub_category_id;

			$data['service_id']=$request->service_id;
			$data['service_plan_id']=$request->service_plan_id;

			if($result == true) {
				return redirect()->route('admin.view.price-by-city', $data)->with('success', 'Price By City updated successfully!');
			}
			return back()->with('error', 'Oops! Price By City not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on PriceByCityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	


}
