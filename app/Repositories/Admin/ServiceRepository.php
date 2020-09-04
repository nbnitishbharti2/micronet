<?php 

namespace App\Repositories\Admin;

use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Type;
use App\Model\Category;
use Log;
use Session;
use File;


class ServiceRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllService()
    {
    	try {
    		return  $query = Service::with(['type','category','sub_category'])->withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllService on ServiceRepository :'. $err->getMessage());
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
                'action'              => route('admin.store.service'),
                'page_title'          => 'Service',
                'title'               => 'Add Service',
                'service_id'          => 0,
                'name'                => (old('name')) ? old('name') : '',
                'image'               => '',
                'type_list'           => Type::getAllTypeForListing(),
                'type_id'             => 0,
                'category_list'       => Category::getAllCategoryForListing(),
                'category_id'         => 0,
                'sub_category_list'   => SubCategory::getAllSubCategoryForListing(),
                'sub_category_id'     => 0,
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on ServiceRepository :'. $err->getMessage());
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
            $destinationImagePath = public_path() . '/service_image'; // upload path

            if (!File::exists($destinationImagePath)){
                File::makeDirectory($destinationImagePath);
            } 

            $image_nn = "Service".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'             => $request->name,
                'image'            => $image_nn,
                'type_id'          => $request->type_id,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id, 
            ];
            
            $service = Service::create($data);
            if ($service->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on ServiceRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $service_id
    * @return array $data
    */
    public function edit($service_id)
    {
        try {
            $service = Service::with(['type','category','sub_category'])->findOrFail($service_id); //Fetch service data 
            $data = [
                'action'             => route('admin.update.service'),
                'page_title'         => 'Service',
                'title'              => 'Edit Service',
                'service_id'         => $service->id,
                'name'               => ($service->name) ? $service->name : old('name'),
                'image'              => $service->image,
                'type_list'          => Type::getAllTypeForListing(),
                'type_id'            => $service->type->id,
                'category_list'      => Category::getAllCategoryForListing(),
                'category_id'        => $service->category->id,
                'sub_category_list'  => SubCategory::getAllSubCategoryForListing(),
                'sub_category_id'    => $service->sub_category->id,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on ServiceRepository :'. $err->getMessage());
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
            $service  = Service::findOrFail($request->service_id); //Fetch Service data
            $oldimage=$service->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/service_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "Service".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $service->image = $image_nn;

                $old_image_path = public_path() . '/service_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }

            $service->name         = $request->name;
            $service->type_id      = $request->type_id;
            $service->category_id  = $request->category_id;
            $service->sub_category_id  = $request->sub_category_id;
            $service->save(); // Update data
            if ($service->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on ServiceRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($service_id)
    {
        try {
            $service = Service::destroy($service_id);

            if ($service) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on ServiceRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($service_id)
    {
        try {
            $service = Service::withTrashed()->find($service_id)->restore();
            if ($service) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on ServiceRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
     public function getService($category_id,$sub_category_id)
    { 
        try {  
            $service_ids=Service::where(['category_id'=>$category_id,'sub_category_id'=>$sub_category_id])->get()->pluck('name', 'id');
            return $service_ids;
        } catch(\Exception $err){
            Log::error('message error in getService on ServiceRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}