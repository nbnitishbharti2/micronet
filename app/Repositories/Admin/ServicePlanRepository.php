<?php 

namespace App\Repositories\Admin;

use App\Model\ServicePlan;
use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Type;
use App\Model\Category;
use Log;
use Session;
use File;


class ServicePlanRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllServicePlan()
    {
    	try {
    		return  $query = ServicePlan::with(['type','category','sub_category','service'])->withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllServicePlan on ServicePlanRepository :'. $err->getMessage());
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
                'action'              => route('admin.store.service-plan'),
                'page_title'          => 'Service Plan',
                'title'               => 'Add Service Plan',
                'service_plan_id'     => 0,
                'name'                => (old('name')) ? old('name') : '',
                'type_list'           => Type::getAllTypeForListing(),
                'type_id'             => 0,
                'category_list'       => Category::getAllCategoryForListing(),
                'category_id'         => 0,
                'sub_category_list'   => SubCategory::getAllSubCategoryForListing(),
                'sub_category_id'     => 0,
                'service_list'        => Service::getAllServiceForListing(),
                'service_id'          => 0,
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on ServicePlanRepository :'. $err->getMessage());
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
            $data = [
                'name'             => $request->name,
                'type_id'          => $request->type_id,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id, 
                'service_id'       => $request->service_id, 
            ];
            
            $service_plan = ServicePlan::create($data);
            if ($service_plan->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on ServicePlanRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $service_plan_id
    * @return array $data
    */
    public function edit($service_plan_id)
    {
        try {
            $service_plan = ServicePlan::with(['type','category','sub_category','service'])->findOrFail($service_plan_id); //Fetch service plan data 
            $data = [
                'action'             => route('admin.update.service-plan'),
                'page_title'         => 'Service Plan',
                'title'              => 'Edit Service Plan',
                'service_plan_id'    => $service_plan->id,
                'name'               => ($service_plan->name) ? $service_plan->name : old('name'),
                'type_list'          => Type::getAllTypeForListing(),
                'type_id'            => $service_plan->type->id,
                'category_list'      => Category::getAllCategoryForListing(),
                'category_id'        => $service_plan->category->id,
                'sub_category_list'  => SubCategory::getAllSubCategoryForListing(),
                'sub_category_id'    => $service_plan->sub_category->id,
                'service_list'       => Service::getAllServiceForListing(),
                'service_id'         => $service_plan->service->id,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on ServicePlanRepository :'. $err->getMessage());
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
            $service_plan  = ServicePlan::findOrFail($request->service_plan_id); //Fetch Service plan data
            
            $service_plan->name         = $request->name;
            $service_plan->type_id      = $request->type_id;
            $service_plan->category_id  = $request->category_id;
            $service_plan->sub_category_id  = $request->sub_category_id;
            $service_plan->service_id  = $request->service_id;
            $service_plan->save(); // Update data
            if ($service_plan->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on ServicePlanRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($service_plan_id)
    {
        try {
            $service_plan = ServicePlan::destroy($service_plan_id);

            if ($service_plan) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on ServicePlanRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($service_plan_id)
    {
        try {
            $service_plan = ServicePlan::withTrashed()->find($service_plan_id)->restore();
            if ($service_plan) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on ServicePlanRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}