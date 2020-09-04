<?php 

namespace App\Repositories\Admin;

use App\Model\SubCategory;
use App\Model\Type;
use App\Model\Category;
use Log;
use Session;
use File;


class SubCategoryRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllSubCategory()
    {
    	try {
    		return  $query = SubCategory::with(['type','category'])->withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllSubCategory on SubCategoryRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.sub-category'),
                'page_title'      => 'Sub Category',
                'title'           => 'Add Sub Category',
                'sub_category_id' => 0,
                'name'            => (old('name')) ? old('name') : '',
                'image'           => '',
                'type_list'       => Type::getAllTypeForListing(),
                'type_id'         => 0,
                'category_list'   => Category::getAllCategoryForListing(),
                'category_id'     => 0,
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on SubCategoryRepository :'. $err->getMessage());
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
            $destinationImagePath = public_path() . '/sub_category_image'; // upload path

            if (!File::exists($destinationImagePath)){
                File::makeDirectory($destinationImagePath);
            } 

            $image_nn = "SubCategory".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'         => $request->name,
                'image'        => $image_nn,
                'type_id'      => $request->type_id,
                'category_id'  => $request->category_id,
            ];
            
            $sub_category = SubCategory::create($data);
            if ($sub_category->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on SubCategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $sub_category_id
    * @return array $data
    */
    public function edit($sub_category_id)
    {
        try {
            $sub_category = SubCategory::with(['type','category'])->findOrFail($sub_category_id); //Fetch sub_category data 
            $data = [
                'action'          => route('admin.update.sub-category'),
                'page_title'      => 'Sub Category',
                'title'           => 'Edit Sub Category',
                'sub_category_id' => $sub_category->id,
                'name'            => ($sub_category->name) ? $sub_category->name : old('name'),
                'image'           => $sub_category->image,
                'type_list'       => Type::getAllTypeForListing(),
                'type_id'         => $sub_category->type->id,
                'category_list'   => Category::getAllCategoryForListing(),
                'category_id'     => $sub_category->category->id,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on SubCategoryRepository :'. $err->getMessage());
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
            $sub_category  = SubCategory::findOrFail($request->sub_category_id); //Fetch SubCategory data
            $oldimage=$sub_category->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/sub_category_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "SubCategory".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $sub_category->image = $image_nn;

                $old_image_path = public_path() . '/sub_category_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }

            $sub_category->name         = $request->name;
            $sub_category->type_id      = $request->type_id;
            $sub_category->category_id  = $request->category_id;
            $sub_category->save(); // Update data
            if ($sub_category->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on SubCategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($sub_category_id)
    {
        try {
            $sub_category = SubCategory::destroy($sub_category_id);

            if ($sub_category) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on SubCategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($sub_category_id)
    {
        try {
            $sub_category = SubCategory::withTrashed()->find($sub_category_id)->restore();
            if ($sub_category) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on SubCategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
     public function getSubCategory($category_id)
    { 
        try { 
            $sub_category_ids=SubCategory::distinct()->where('category_id',$category_id)->get()->pluck('name', 'id');
            return $sub_category_ids;
        } catch(\Exception $err){
            Log::error('message error in getSubCategory on SubCategoryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
}