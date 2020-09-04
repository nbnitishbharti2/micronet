<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ServiceDescriptionRepository;
use App\Http\Requests\Admin\ServiceDescriptionRequest;
use App\Model\Service;
use App\Model\ServiceDescription;
use Validator;
use Log;
use App;
use Session;
use Helper;



class ServiceDescriptionController extends Controller
{
   	public function __construct(ServiceDescriptionRepository $service_description)
	{
		$this->service_description = $service_description;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['service_description'] = $this->service_description->getAllServiceDescription();// Fetch all service description data
			return view('admin.service_description.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on ServiceDescriptionController :'. $err->getMessage());
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
			$data = $this->service_description->create(); 
			return view('admin.service_description.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\ServiceDescriptionRequest $service_description_request
	* @return Illuminate\Http\Response
	*/
	public function store(ServiceDescriptionRequest $service_description_request)
	{
		try {
			$result = $this->service_description->store($service_description_request);
			if($result == true) {
				return back()->with('success', 'Service Description added successfully!');
			}
			return back()->with('error', 'Oops! Service Description not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $service_description_id
	* @return Illuminate\Http\Response
	*/
	public function edit($service_description_id = 0)
	{
		try {
			if($service_description_id == 0){
				return back()->with('error', 'Oops! Service Description not found.');
			}
			$data = $this->service_description->edit($service_description_id);
			return view('admin.service_description.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(ServiceDescriptionRequest $request)
	{
		try {
			$result = $this->service_description->update($request);
			if($result == true) {
				return redirect()->route('admin.view.service-description')->with('success', 'Service Description updated successfully!');
			}
			return back()->with('error', 'Oops! Service Description not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $service_description_id
	* @return Illuminate\Http\Response
	*/
	public function delete($service_description_id = 0)
	{
		try {
			if($service_description_id == 0){
				return back()->with('error', 'Oops! Service Description not found.');
			}
			$result = $this->service_description->delete($service_description_id);
			if($result == true) {
				return back()->with('success', 'Service Description deleted successfully!');
			}
			return back()->with('error', 'Oops! Service Description not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $service_description_id
	* @return Illuminate\Http\Response
	*/
	public function restore($service_description_id = 0)
	{
		try {
			if($service_description_id == 0){
				return back()->with('error', 'Oops! Service Description not found.');
			}
			$result = $this->service_description->restore($service_description_id);
			if($result == true) {
				return back()->with('success', 'Service Description restored successfully!');
			}
			return back()->with('error', 'Oops! Service Description not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on ServiceDescriptionController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
