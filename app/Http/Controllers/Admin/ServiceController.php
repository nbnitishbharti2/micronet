<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ServiceRepository;
use App\Http\Requests\Admin\ServiceRequest;
use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Type;
use Validator;
use Log;
use App;
use Session;
use Helper;



class ServiceController extends Controller
{
   	public function __construct(ServiceRepository $service)
	{
		$this->service = $service;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['service'] = $this->service->getAllService(); // Fetch all service data
			return view('admin.service.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on ServiceController :'. $err->getMessage());
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
			$data = $this->service->create();
			return view('admin.service.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\ServiceRequest $service_request
	* @return Illuminate\Http\Response
	*/
	public function store(ServiceRequest $service_request)
	{
		try {
			$result = $this->service->store($service_request);
			if($result == true) {
				return back()->with('success', 'Service added successfully!');
			}
			return back()->with('error', 'Oops! Service not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $service_id
	* @return Illuminate\Http\Response
	*/
	public function edit($service_id = 0)
	{
		try {
			if($service_id == 0){
				return back()->with('error', 'Oops! Service not found.');
			}
			$data = $this->service->edit($service_id);
			return view('admin.service.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(ServiceRequest $request)
	{
		try {
			$result = $this->service->update($request);
			if($result == true) {
				return redirect()->route('admin.view.service')->with('success', 'Service updated successfully!');
			}
			return back()->with('error', 'Oops! Service not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $service_id
	* @return Illuminate\Http\Response
	*/
	public function delete($service_id = 0)
	{
		try {
			if($service_id == 0){
				return back()->with('error', 'Oops! Service not found.');
			}
			$result = $this->service->delete($service_id);
			if($result == true) {
				return back()->with('success', 'Service deleted successfully!');
			}
			return back()->with('error', 'Oops! Service not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $service_id
	* @return Illuminate\Http\Response
	*/
	public function restore($service_id = 0)
	{
		try {
			if($service_id == 0){
				return back()->with('error', 'Oops! Service not found.');
			}
			$result = $this->service->restore($service_id);
			if($result == true) {
				return back()->with('success', 'Service restored successfully!');
			}
			return back()->with('error', 'Oops! Service not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on ServiceController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}
    public function getService(Request $request)
	{
		try {
			$data = $this->service->getService($request->category_id,$request->sub_category_id);
			return json_encode($data);
		} catch(\Exception $err){
			Log::error('Error in getService on ServiceController :'. $err->getMessage());
			return back()->with('error', $err->getMessage());
		}
	}

	
}
