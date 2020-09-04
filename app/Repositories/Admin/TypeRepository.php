<?php 

namespace App\Repositories\Admin;

use App\Model\Type;
use Log;
use Session;
use File;

class TypeRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllType()
    {
    	try {
    		return  $query = Type::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllType on TypeRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.type'),
                'page_title'      => 'Type',
                'title'           => 'Add Type',
                'type_id' => 0,
                'name'            => (old('name')) ? old('name') : '',
                'image'           => '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on TypeRepository :'. $err->getMessage());
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
            $destinationImagePath = public_path() . '/type_image'; // upload path

            if (!File::exists($destinationImagePath)){
                File::makeDirectory($destinationImagePath);
            } 

            $image_nn = "Type".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'    => $request->name,
                'image'   => $image_nn,
            ];
            
            $type = Type::create($data);
            if ($type->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on TypeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $type_id
    * @return array $data
    */
    public function edit($type_id)
    {
        try {
            $type = Type::findOrFail($type_id); //Fetch category data 
            $data = [
                'action'          => route('admin.update.type'),
                'page_title'      => 'Type',
                'title'           => 'Edit Type',
                'type_id'         => $type->id,
                'name'            => ($type->name) ? $type->name : old('name'),
                'image'           => $type->image,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on TypeRepository :'. $err->getMessage());
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
            $type  = Type::findOrFail($request->type_id); //Fetch type data
            $oldimage=$type->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/type_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "Type".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $type->image = $image_nn;

                $old_image_path = public_path() . '/type_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }
            
            $type->name  = $request->name;
            $type->save(); // Update data
            if ($type->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on TypeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($type_id)
    {
        try {
            $type = Type::destroy($type_id);

            if ($type) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on TypeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($type_id)
    {
        try {
            $type = Type::withTrashed()->find($type_id)->restore();
            if ($type) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on TypeRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}