<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\GalleryRepository;
use App\Http\Requests\Admin\GalleryRequest;
use App\Model\Gallery;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;

class GalleryController extends Controller
{
   	public function __construct(GalleryRepository $gallery)
	{
		$this->gallery = $gallery;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['type'] = $this->gallery->getAllGallery(); // Fetch all type data
			return view('admin.gallery.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on GalleryController :'. $err->getMessage());
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
			$data = $this->gallery->create();
			return view('admin.gallery.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on GalleryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\GalleryRequest $type_request
	* @return Illuminate\Http\Response
	*/
	public function store(GalleryRequest $type_request)
	{
		try {
			$result = $this->gallery->store($type_request);
			if($result == true) {
				return back()->with('success', 'Gallery added successfully!');
			}
			return back()->with('error', 'Oops! Gallery not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on GalleryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Gallery not found.');
			}
			$data = $this->gallery->edit($type_id);
			return view('admin.gallery.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on GalleryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(GalleryRequest $request)
	{
		try {
			$result = $this->gallery->update($request);
			if($result == true) {
				return redirect()->route('admin.view.gallery')->with('success', 'Gallery updated successfully!');
			}
			return back()->with('error', 'Oops! Gallery not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on GalleryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Gallery not found.');
			}
			$result = $this->gallery->delete($type_id);
			if($result == true) {
				return back()->with('success', 'Gallery deleted successfully!');
			}
			return back()->with('error', 'Oops! Gallery not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on GalleryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Gallery not found.');
			}
			$result = $this->gallery->restore($type_id);
			if($result == true) {
				return back()->with('success', 'Gallery restored successfully!');
			}
			return back()->with('error', 'Oops! Gallery not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on GalleryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
