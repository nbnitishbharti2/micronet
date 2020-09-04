<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Requests\Admin\CategoryRequest;
use App\Model\Category;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class CategoryController extends Controller
{
   	public function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['category'] = $this->category->getAllCategory(); // Fetch all category data
			return view('admin.category.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on CategoryController :'. $err->getMessage());
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
			$data = $this->category->create();
			return view('admin.category.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in create on CategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to create resource
	* @param App\Http\Requests\CategoryRequest $category_request
	* @return Illuminate\Http\Response
	*/
	public function store(CategoryRequest $category_request)
	{
		try {
			$result = $this->category->store($category_request);
			if($result == true) {
				return back()->with('success', 'Category added successfully!');
			}
			return back()->with('error', 'Oops! Category not added.');
		} catch(\Exception $err){
    		Log::error('Error in store on CategoryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Category not found.');
			}
			$data = $this->category->edit($category_id);
			return view('admin.category.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on CategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(CategoryRequest $request)
	{
		try {
			$result = $this->category->update($request);
			if($result == true) {
				return redirect()->route('admin.view.category')->with('success', 'Category updated successfully!');
			}
			return back()->with('error', 'Oops! Category not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on CategoryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Category not found.');
			}
			$result = $this->category->delete($category_id);
			if($result == true) {
				return back()->with('success', 'Category deleted successfully!');
			}
			return back()->with('error', 'Oops! Category not deleted.');
		} catch(\Exception $err){
    		Log::error('Error in delete on CategoryController :'. $err->getMessage());
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
				return back()->with('error', 'Oops! Category not found.');
			}
			$result = $this->category->restore($category_id);
			if($result == true) {
				return back()->with('success', 'Category restored successfully!');
			}
			return back()->with('error', 'Oops! Category not restored.');
		} catch(\Exception $err){
    		Log::error('Error in restore on CategoryController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
}
