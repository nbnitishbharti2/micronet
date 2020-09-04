<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\CityRepository;
use App\Http\Requests\Admin\CityRequest;
use App\Model\City;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;

class CityController extends Controller
{
   	public function __construct(CityRepository $city)
	{
		$this->city = $city;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['city'] = $this->city->getAllCity(); // Fetch all city data
			return view('admin.city.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for create resource
	*
	* @return Illuminate\Http\Response
	*/
	public function create()
	{
		try {
			$data = $this->city->create();
			return view('admin.city.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\CityRequest $city_request
	* @return Illuminate\Http\Response
	*/
	public function store(CityRequest $city_request)
	{
		try {
			$result = $this->city->store($city_request);
			if($result == true) {
				return back()->with('success', 'City added successfully!');
			}
			return back()->with('error', 'Oops! City not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $city_id
	* @return Illuminate\Http\Response
	*/
	public function edit($city_id = 0)
	{
		try {
			if($city_id == 0){
				return back()->with('error', 'Oops! City not found.');
			}
			$data = $this->city->edit($city_id);
			return view('admin.city.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(CityRequest $request)
	{
		try {
			$result = $this->city->update($request);
			if($result == true) {
				return redirect()->route('admin.view.city')->with('success', 'City updated successfully!');
			}
			return back()->with('error', 'Oops! City not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $city_id
	* @return Illuminate\Http\Response
	*/
	public function delete($city_id = 0)
	{
		try {
			if($city_id == 0){
				return back()->with('error', 'Oops! City not found.');
			}
			$result = $this->city->delete($city_id);
			if($result == true) {
				return back()->with('success', 'City deleted successfully!');
			}
			return back()->with('error', 'Oops! City not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $city_id
	* @return Illuminate\Http\Response
	*/
	public function restore($city_id = 0)
	{
		try {
			if($city_id == 0){
				return back()->with('error', 'Oops! City not found.');
			}
			$result = $this->city->restore($city_id);
			if($result == true) {
				return back()->with('success', 'City restored successfully!');
			}
			return back()->with('error', 'Oops! City not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on CityController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}
	
	public function getCity(Request $request)
	{
		try {
			$data = $this->city->getCity($request->state_id);
			return json_encode($data);
		} catch(\Exception $err){
			Log::error('Error in getCity on CityController :'. $err->getMessage());
			return back()->with('error', $err->getMessage());
		}
	}

	
}
