<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ServicesRepository;
use App\Http\Requests\Admin\ServicesRequest;
use App\Model\Services;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class ServicesController extends Controller
{
   	public function __construct(ServicesRepository $services)
	{
		$this->services = $services;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['category'] = $this->services->getAllServices(); // Fetch all category data
			return view('admin.services.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on ServicesController :'. $err->getMessage());
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
			$data = $this->services->create();
			return view('admin.services.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\CategoryRequest $category_request
	* @return Illuminate\Http\Response
	*/
	public function store(ServicesRequest $category_request)
	{
		try {
			$result = $this->services->store($category_request);
			if($result == true) {
				return back()->with('success', 'Services added successfully!');
			}
			return back()->with('error', 'Oops! Services not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $category_id
	* @return Illuminate\Http\Response
	*/
	public function edit($category_id = 0)
	{
		try {
			if($category_id == 0){
				return back()->with('error', 'Oops! Services not found.');
			}
			$data = $this->services->edit($category_id);
			return view('admin.services.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(ServicesRequest $request)
	{
		try {
			$result = $this->services->update($request);
			if($result == true) {
				return redirect()->route('admin.view.services')->with('success', 'Services updated successfully!');
			}
			return back()->with('error', 'Oops! Services not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $category_id
	* @return Illuminate\Http\Response
	*/
	public function delete($category_id = 0)
	{
		try {
			if($category_id == 0){
				return back()->with('error', 'Oops! Services not found.');
			}
			$result = $this->services->delete($category_id);
			if($result == true) {
				return back()->with('success', 'Services deleted successfully!');
			}
			return back()->with('error', 'Oops! Services not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $category_id
	* @return Illuminate\Http\Response
	*/
	public function restore($category_id = 0)
	{
		try {
			if($category_id == 0){
				return back()->with('error', 'Oops! Services not found.');
			}
			$result = $this->services->restore($category_id);
			if($result == true) {
				return back()->with('success', 'Services restored successfully!');
			}
			return back()->with('error', 'Oops! Services not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on ServicesController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
