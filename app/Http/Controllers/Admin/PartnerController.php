<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\PartnerRepository;
use App\Http\Requests\Admin\PartnerRequest;
use App\Model\partner;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;
use File;



class PartnerController extends Controller
{
   	public function __construct(PartnerRepository $partner)
	{
		$this->partner = $partner;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['partner'] = $this->partner->getAllPartner(); // Fetch all partner data
			return view('admin.partner.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on PartnerController :'. $err->getMessage());
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
			$data = $this->partner->create();
			return view('admin.partner.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\PartnerRequest $partner_request
	* @return Illuminate\Http\Response
	*/
	public function store(PartnerRequest $partner_request)
	{
		try {
			$result = $this->partner->store($partner_request);
			if($result == true) {
				return back()->with('success', 'Partner added successfully!');
			}
			return back()->with('error', 'Oops! Partner not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $partner_id
	* @return Illuminate\Http\Response
	*/
	public function edit($partner_id = 0)
	{
		try {
			if($partner_id == 0){
				return back()->with('error', 'Oops! Partner not found.');
			}
			$data = $this->partner->edit($partner_id);
			return view('admin.partner.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(PartnerRequest $request)
	{
		try {
			$result = $this->partner->update($request);
			if($result == true) {
				return redirect()->route('admin.view.partner')->with('success', 'Partner updated successfully!');
			}
			return back()->with('error', 'Oops! Partner not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $partner_id
	* @return Illuminate\Http\Response
	*/
	public function delete($partner_id = 0)
	{
		try {
			if($partner_id == 0){
				return back()->with('error', 'Oops! Partner not found.');
			}
			$result = $this->partner->delete($partner_id);
			if($result == true) {
				return back()->with('success', 'Partner deleted successfully!');
			}
			return back()->with('error', 'Oops! Partner not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $partner_id
	* @return Illuminate\Http\Response
	*/
	public function restore($partner_id = 0)
	{
		try {
			if($partner_id == 0){
				return back()->with('error', 'Oops! Partner not found.');
			}
			$result = $this->partner->restore($partner_id);
			if($result == true) {
				return back()->with('success', 'Partner restored successfully!');
			}
			return back()->with('error', 'Oops! Partner not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on PartnerController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
