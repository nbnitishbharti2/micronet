<?php 

namespace App\Repositories\Admin;

use App\Model\State;
use Log;
use Session;

class StateRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllState()
    {
    	try {
    		return  $query = State::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllState on StateRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.state'),
                'page_title'      => 'State',
                'title'           => 'Add State',
                'state_id'        => 0,
                'name'            => (old('name')) ? old('name') : '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on StateRepository :'. $err->getMessage());
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
                'name'    => $request->name
            ];
            
            $state = State::create($data);
            if ($state->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on StateRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $state_id
    * @return array $data
    */
    public function edit($state_id)
    {
        try {
            $state = State::findOrFail($state_id); //Fetch state data 
            $data = [
                'action'          => route('admin.update.state'),
                'page_title'      => 'State',
                'title'           => 'EditState',
                'state_id'        => $state->id,
                'name'            => ($state->name) ? $state->name : old('name')
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on StateRepository :'. $err->getMessage());
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
            $state  = State::findOrFail($request->state_id); //Fetch state data
            $state->name  = $request->name;
            $state->save(); // Update data
            if ($state->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on StateRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($state_id)
    {
        try {
            $state = State::destroy($state_id);
            if ($state) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on StateRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($state_id)
    {
        try {
            $state = State::withTrashed()->find($state_id)->restore();
            if ($state) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on StateRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}