<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\StateRepository;
use App\Http\Requests\Admin\StateRequest;
use App\Model\State;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class StateController extends Controller
{
   	public function __construct(StateRepository $state)
	{
		$this->state = $state;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['state'] = $this->state->getAllState(); // Fetch all state data
			return view('admin.state.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on StateController :'. $err->getMessage());
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
			$data = $this->state->create();
			return view('admin.state.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\StateRequest $state_request
	* @return Illuminate\Http\Response
	*/
	public function store(StateRequest $state_request)
	{
		try {
			$result = $this->state->store($state_request);
			if($result == true) {
				return back()->with('success', 'State added successfully!');
			}
			return back()->with('error', 'Oops! State not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $state_id
	* @return Illuminate\Http\Response
	*/
	public function edit($state_id = 0)
	{
		try {
			if($state_id == 0){
				return back()->with('error', 'Oops! State not found.');
			}
			$data = $this->state->edit($state_id);
			return view('admin.state.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(StateRequest $request)
	{
		try {
			$result = $this->state->update($request);
			if($result == true) {
				return redirect()->route('admin.view.state')->with('success', 'State updated successfully!');
			}
			return back()->with('error', 'Oops! State not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $state_id
	* @return Illuminate\Http\Response
	*/
	public function delete($state_id = 0)
	{
		try {
			if($state_id == 0){
				return back()->with('error', 'Oops! State not found.');
			}
			$result = $this->state->delete($state_id);
			if($result == true) {
				return back()->with('success', 'State deleted successfully!');
			}
			return back()->with('error', 'Oops! State not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $state_id
	* @return Illuminate\Http\Response
	*/
	public function restore($state_id = 0)
	{
		try {
			if($state_id == 0){
				return back()->with('error', 'Oops! State not found.');
			}
			$result = $this->state->restore($state_id);
			if($result == true) {
				return back()->with('success', 'State restored successfully!');
			}
			return back()->with('error', 'Oops! State not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on StateController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
