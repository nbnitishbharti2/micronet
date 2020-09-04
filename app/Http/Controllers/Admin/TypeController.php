<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\TypeRepository;
use App\Http\Requests\Admin\TypeRequest;
use App\Model\Type;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;

class TypeController extends Controller
{
   	public function __construct(TypeRepository $type)
	{
		$this->type = $type;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['type'] = $this->type->getAllType(); // Fetch all type data
			return view('admin.type.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on TypeController :'. $err->getMessage());
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
			$data = $this->type->create();
			return view('admin.type.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\TypeRequest $type_request
	* @return Illuminate\Http\Response
	*/
	public function store(TypeRequest $type_request)
	{
		try {
			$result = $this->type->store($type_request);
			if($result == true) {
				return back()->with('success', 'Type added successfully!');
			}
			return back()->with('error', 'Oops! Type not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $type_id
	* @return Illuminate\Http\Response
	*/
	public function edit($type_id = 0)
	{
		try {
			if($type_id == 0){
				return back()->with('error', 'Oops! Type not found.');
			}
			$data = $this->type->edit($type_id);
			return view('admin.type.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(TypeRequest $request)
	{
		try {
			$result = $this->type->update($request);
			if($result == true) {
				return redirect()->route('admin.view.type')->with('success', 'Type updated successfully!');
			}
			return back()->with('error', 'Oops! Type not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $type_id
	* @return Illuminate\Http\Response
	*/
	public function delete($type_id = 0)
	{
		try {
			if($type_id == 0){
				return back()->with('error', 'Oops! Type not found.');
			}
			$result = $this->type->delete($type_id);
			if($result == true) {
				return back()->with('success', 'Type deleted successfully!');
			}
			return back()->with('error', 'Oops! Type not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $type_id
	* @return Illuminate\Http\Response
	*/
	public function restore($type_id = 0)
	{
		try {
			if($type_id == 0){
				return back()->with('error', 'Oops! Type not found.');
			}
			$result = $this->type->restore($type_id);
			if($result == true) {
				return back()->with('success', 'Type restored successfully!');
			}
			return back()->with('error', 'Oops! Type not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on TypeController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
