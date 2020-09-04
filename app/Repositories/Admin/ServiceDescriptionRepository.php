<?php 

namespace App\Repositories\Admin;

use App\Model\Service;
use App\Model\ServiceDescription;
use Log;
use Session;
use File;


class ServiceDescriptionRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllServiceDescription()
    {
    	try {
    		return  $query = ServiceDescription::with(['service'])->withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllServiceDescription on ServiceDescriptionRepository :'. $err->getMessage());
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
                'action'                 => route('admin.store.service-description'),
                'page_title'             => 'Service Description',
                'title'                  => 'Add Service Description',
                'service_description_id' => 0,
                'service_list'           => Service::getAllServiceForListing(),
                'service_id'             => 0,
                'description'            => (old('description')) ? old('description') : '',
                'availability_list'      => ServiceDescription::getAvailability(),
                'availability'           => '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on ServiceDescriptionRepository :'. $err->getMessage());
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
                'service_id'   => $request->service_id,
                'description'  => $request->description, 
                'availability'  => $request->availability,
            ];
            
            $service_description = ServiceDescription::create($data);
            if ($service_description->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on ServiceDescriptionRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $service_description_id
    * @return array $data
    */
    public function edit($service_description_id)
    {
        try {
            $service_description = ServiceDescription::with(['service'])->findOrFail($service_description_id); //Fetch service description data 
            $data = [
                'action'                  => route('admin.update.service-description'),
                'page_title'              => 'Service Description',
                'title'                   => 'Edit Service Description',
                'service_description_id'  => $service_description->id,
                'description'             => ($service_description->description) ? $service_description->description : old('description'),
                'service_list'            => Service::getAllServiceForListing(),
                'service_id'              => $service_description->service->id,
                'availability_list'      => ServiceDescription::getAvailability(),
                'availability'           => ($service_description->availability) ? $service_description->availability : old('availability'),
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on ServiceDescriptionRepository :'. $err->getMessage());
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
            $service_description  = ServiceDescription::findOrFail($request->service_description_id); //Fetch Service description data
            
            $service_description->service_id  = $request->service_id;
            $service_description->description = $request->description;
            $service_description->availability = $request->availability;
            $service_description->save(); // Update data
            if ($service_description->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on ServiceDescriptionRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($service_description_id)
    {
        try {
            $service_description = ServiceDescription::destroy($service_description_id);

            if ($service_description) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on ServiceDescriptionRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($service_description_id)
    {
        try {
            $service_description = ServiceDescription::withTrashed()->find($service_description_id)->restore();
            if ($service_description) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on ServiceDescriptionRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}