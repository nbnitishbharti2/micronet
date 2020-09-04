<?php 

namespace App\Repositories\Admin;

use App\Model\Category;
use Log;
use Session;
use File;

class CategoryRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllCategory()
    {
    	try {
    		return  $query = Category::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllCategory on CategoryRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }

    /**
    * Method to fetch create resource data
    *
    * @return array $data
    */
    public function create()
    {
        try {
            $data = [
                'action'          => route('admin.store.category'),
                'page_title'      => 'category',
                'title'           => 'Add category',
                'category_id' => 0,
                'name'            => (old('name')) ? old('name') : '',
                'image'           => '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to create resource
    * @param $request
    * @return boolean
    */
    public function store($request)
    {
        try {
            $image = $request['image'];
            $image_ext = $image->getClientOriginalExtension();
            $destinationImagePath = public_path() . '/category_image'; // upload path

            if (!File::exists($destinationImagePath)){
                File::makeDirectory($destinationImagePath);
            } 

            $image_nn = "Category".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'    => $request->name,
                'image'   => $image_nn,
            ];
            
            $category = Category::create($data);
            if ($category->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $category_id
    * @return array $data
    */
    public function edit($category_id)
    {
        try {
            $category = Category::findOrFail($category_id); //Fetch category data 
            $data = [
                'action'          => route('admin.update.category'),
                'page_title'      => 'Category',
                'title'           => 'Edit Category',
                'category_id'     => $category->id,
                'name'            => ($category->name) ? $category->name : old('name'),
                'image'           => $category->image,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to update resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function update($request)
    {
        try {
            $category  = Category::findOrFail($request->category_id); //Fetch category data
            $oldimage=$category->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/category_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "Category".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $category->image = $image_nn;

                $old_image_path = public_path() . '/category_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }

            $category->name  = $request->name;
            $category->save(); // Update data
            if ($category->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($category_id)
    {
        try {
            $category = Category::destroy($category_id);

            if ($category) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($category_id)
    {
        try {
            $category = Category::withTrashed()->find($category_id)->restore();
            if ($category) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on CategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}