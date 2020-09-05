<?php 

namespace App\Repositories\Admin;

use App\Model\Gallery;
use Log;
use Session;
use File;

class GalleryRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllGallery()
    {
    	try {
    		return  $query = Gallery::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllType on GalleryRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.gallery'),
                'page_title'      => 'Gallery',
                'title'           => 'Add Gallery',
                'type_id' => 0,
                'name'            => (old('name')) ? old('name') : '',
                'image'           => '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on GalleryRepository :'. $err->getMessage());
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
            $destinationImagePath = public_path() . '/gallery_image'; // upload path

            if (!File::exists($destinationImagePath)){
                File::makeDirectory($destinationImagePath);
            } 

            $image_nn = "Gallery".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'    => $request->name,
                'image'   => $image_nn,
            ];
            
            $type = Gallery::create($data);
            if ($type->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on GalleryRepository :'. $err->getMessage());
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
            $type = Gallery::findOrFail($type_id); //Fetch category data 
            $data = [
                'action'          => route('admin.update.gallery'),
                'page_title'      => 'Gallery',
                'title'           => 'Edit Gallery',
                'type_id'         => $type->id,
                'name'            => ($type->name) ? $type->name : old('name'),
                'image'           => $type->image,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on GalleryRepository :'. $err->getMessage());
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
            $type  = Gallery::findOrFail($request->type_id); //Fetch type data
            $oldimage=$type->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/gallery_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "Gallery".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $type->image = $image_nn;

                $old_image_path = public_path() . '/gallery_image/'.$oldimage;

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
            Log::error('message error in update on GalleryRepository :'. $err->getMessage());
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
            $type = Gallery::destroy($type_id);

            if ($type) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on GalleryRepository :'. $err->getMessage());
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
            $type = Gallery::withTrashed()->find($type_id)->restore();
            if ($type) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on GalleryRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}