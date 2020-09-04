<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ServicePlanRepository;
use App\Http\Requests\Admin\ServicePlanRequest;
use App\Model\ServicePlan;
use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Type;
use Validator;
use Log;
use App;
use Session;
use Helper;



class ServicePlanController extends Controller
{
   	public function __construct(ServicePlanRepository $service_plan)
	{
		$this->service_plan = $service_plan;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['service_plan'] = $this->service_plan->getAllServicePlan(); // Fetch all service plan data
			return view('admin.service_plan.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on ServicePlanController :'. $err->getMessage());
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
			$data = $this->service_plan->create();
			return view('admin.service_plan.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\ServicePlanRequest $service_plan_request
	* @return Illuminate\Http\Response
	*/
	public function store(ServicePlanRequest $service_plan_request)
	{
		try {
			$result = $this->service_plan->store($service_plan_request);
			if($result == true) {
				return back()->with('success', 'Service Plan added successfully!');
			}
			return back()->with('error', 'Oops! Service Plan not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $service_plan_id
	* @return Illuminate\Http\Response
	*/
	public function edit($service_plan_id = 0)
	{
		try {
			if($service_plan_id == 0){
				return back()->with('error', 'Oops! Service Plan not found.');
			}
			$data = $this->service_plan->edit($service_plan_id);
			return view('admin.service_plan.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(ServicePlanRequest $request)
	{
		try {
			$result = $this->service_plan->update($request);
			if($result == true) {
				return redirect()->route('admin.view.service-plan')->with('success', 'Service Plan updated successfully!');
			}
			return back()->with('error', 'Oops! Service Plan not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $service_plan_id
	* @return Illuminate\Http\Response
	*/
	public function delete($service_plan_id = 0)
	{
		try {
			if($service_plan_id == 0){
				return back()->with('error', 'Oops! Service Plan not found.');
			}
			$result = $this->service_plan->delete($service_plan_id);
			if($result == true) {
				return back()->with('success', 'Service Plan deleted successfully!');
			}
			return back()->with('error', 'Oops! Service Plan not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $service_plan_id
	* @return Illuminate\Http\Response
	*/
	public function restore($service_plan_id = 0)
	{
		try {
			if($service_plan_id == 0){
				return back()->with('error', 'Oops! Service Plan not found.');
			}
			$result = $this->service_plan->restore($service_plan_id);
			if($result == true) {
				return back()->with('success', 'Service Plan restored successfully!');
			}
			return back()->with('error', 'Oops! Service Plan not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on ServicePlanController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
