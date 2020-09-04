<?php 

namespace App\Repositories\Admin;

use App\Model\City;
use App\Model\State;
use Log;
use Session;

class CityRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllCity()
    {
        try {
            return  $query = City::with('state')->withTrashed()->get();  
        } catch(\Exception $err){
            Log::error('message error in getAllCity on CityRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.city'),
                'page_title'      => 'City',
                'title'           => 'Add City',
                'city_id'         => 0,
                'name'            => (old('name')) ? old('name') : '',
                'state_list'      => State::getAllStateForListing(),
                'state_id'        => 0,
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on CityRepository :'. $err->getMessage());
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
                'name'      => $request->name,
                'state_id'  => $request->state_id,
            ];
            
            $city = City::create($data);
            if ($city->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on CityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $city_id
    * @return array $data
    */
    public function edit($city_id)
    {
        try {
            $city = City::with('state')->findOrFail($city_id); //Fetch city data 
            $data = [
                'action'          => route('admin.update.city'),
                'page_title'      => 'City',
                'title'           => 'Edit City',
                'city_id'         => $city->id,
                'name'            => ($city->name) ? $city->name : old('name'),
                'state_list'      => State::getAllStateForListing(),
                'state_id'        => $city->state->id,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on CityRepository :'. $err->getMessage());
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
            $city  = City::findOrFail($request->city_id); //Fetch city data
            $city->name       = $request->name;
            $city->state_id   =  $request->state_id;
            $city->save(); // Update data
            if ($city->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on CityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($city_id)
    {
        try {
            $city = City::destroy($city_id);
            if ($city) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on CityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($city_id)
    {
        try {
            $city = City::withTrashed()->find($city_id)->restore();
            if ($city) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on CityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
    
    
    public function getCity($state_id)
    {
        try {  
            $city_ids=City::where(['state_id'=>$state_id])->get()->pluck('name', 'id');
            return $city_ids;
        } catch(\Exception $err){
            Log::error('message error in getCity on CityRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
}