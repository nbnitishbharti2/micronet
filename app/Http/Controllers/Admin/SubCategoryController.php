<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\SubCategoryRepository;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Type;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class SubCategoryController extends Controller
{
   	public function __construct(SubCategoryRepository $sub_category)
	{
		$this->sub_category = $sub_category;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['sub_category'] = $this->sub_category->getAllSubCategory(); // Fetch all subcategory data
			return view('admin.subcategory.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on SubCategoryController :'. $err->getMessage());
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
			$data = $this->sub_category->create();
			return view('admin.subcategory.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\SubCategoryRequest $subcategory_request
	* @return Illuminate\Http\Response
	*/
	public function store(SubCategoryRequest $subcategory_request)
	{
		try {
			$result = $this->sub_category->store($subcategory_request);
			if($result == true) {
				return back()->with('success', 'Sub Category added successfully!');
			}
			return back()->with('error', 'Oops! Sub Category not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to show form for edit resource
	* @param int $sub_category_id
	* @return Illuminate\Http\Response
	*/
	public function edit($sub_category_id = 0)
	{
		try {
			if($sub_category_id == 0){
				return back()->with('error', 'Oops! Sub Category not found.');
			}
			$data = $this->sub_category->edit($sub_category_id);
			return view('admin.subcategory.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(SubCategoryRequest $request)
	{
		try {
			$result = $this->sub_category->update($request);
			if($result == true) {
				return redirect()->route('admin.view.sub-category')->with('success', 'SubCategory updated successfully!');
			}
			return back()->with('error', 'Oops! Sub Category not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to delete resource
	* @param int $subcategory_id
	* @return Illuminate\Http\Response
	*/
	public function delete($sub_category_id = 0)
	{
		try {
			if($sub_category_id == 0){
				return back()->with('error', 'Oops! Sub Category not found.');
			}
			$result = $this->sub_category->delete($sub_category_id);
			if($result == true) {
				return back()->with('success', 'Sub Category deleted successfully!');
			}
			return back()->with('error', 'Oops! Sub Category not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to restore resource
	* @param int $sub_category_id
	* @return Illuminate\Http\Response
	*/
	public function restore($sub_category_id = 0)
	{
		try {
			if($sub_category_id == 0){
				return back()->with('error', 'Oops! Sub Category not found.');
			}
			$result = $this->sub_category->restore($sub_category_id);
			if($result == true) {
				return back()->with('success', 'Sub Category restored successfully!');
			}
			return back()->with('error', 'Oops! Sub Category not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on SubCategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}
	public function getSubCategory(Request $request)
	{
		try {
			$data = $this->sub_category->getSubCategory($request->category_id);
			return json_encode($data);
		} catch(\Exception $err){
			Log::error('Error in getSubCategory on SubCategoryController :'. $err->getMessage());
			return back()->with('error', $err->getMessage());
		}
	}

	
}
