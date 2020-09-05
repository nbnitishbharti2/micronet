<?php 

namespace App\Repositories\Admin;

use App\Model\Services;
use Log;
use Session;
use File;

class ServicesRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllServices()
    {
    	try {
    		return  $query = Services::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllCategory on ServicesRepository :'. $err->getMessage());
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
                'action'          => route('admin.store.services'),
                'page_title'      => 'Services',
                'title'           => 'Add Services',
                'category_id' => 0,
                'name'            => (old('name')) ? old('name') : '',
                'short_description'=> (old('short_description')) ? old('short_description') : '',
                'description'      => (old('description')) ? old('description') : '',
                'price'            => (old('price')) ? old('price') : '',
                'discount'            => (old('discount')) ? old('discount') : '',
                'new_price'            => (old('new_price')) ? old('new_price') : '',
                'image'           => '',
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on ServicesRepository :'. $err->getMessage());
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

            $image_nn = "Services".time() . "." . $image_ext;

            $image->move($destinationImagePath, $image_nn);

            $data = [
                'name'    => $request->name,
                'price'  => $request->price,
                'discount'  => $request->discount,
                'new_price'  => $request->new_price,
                'short_description'  => $request->short_description,
                'description'  => $request->description,
                'image'   => $image_nn,
            ];
            
            $category = Services::create($data);
            if ($category->exists) {
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on ServicesRepository :'. $err->getMessage());
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
            $category = Services::findOrFail($category_id); //Fetch category data 
            $data = [
                'action'          => route('admin.update.services'),
                'page_title'      => 'Services',
                'title'           => 'Edit Services',
                'category_id'     => $category->id,
                'name'            => ($category->name) ? $category->name : old('name'),
                'short_description'=> ($category->short_description) ? $category->short_description : old('short_description'),
                'description'      => ($category->description) ? $category->description : old('description'),
                'price'            => ($category->price) ? $category->price : old('price'),
                'discount'            => ($category->discount) ? $category->discount : old('discount'),
                'new_price'            => ($category->new_price) ? $category->new_price : old('new_price'),
                'image'           => $category->image,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on ServicesRepository :'. $err->getMessage());
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
            $category  = Services::findOrFail($request->category_id); //Fetch category data
            $oldimage=$category->image;

            if(isset($request['image']))
            {
                $image = $request['image'];
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path() . '/service_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "Services".time() . "." . $image_ext;
                $image->move($destinationImagePath, $image_nn);
                $category->image = $image_nn;

                $old_image_path = public_path() . '/service_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }

            $category->name  = $request->name;
            $category->price  = $request->price;
            $category->discount  = $request->discount;
            $category->new_price  = $request->new_price;
            $category->short_description  = $request->short_description;
            $category->description  = $request->description;
            $category->save(); // Update data
            if ($category->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on ServicesRepository :'. $err->getMessage());
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
            $category = Services::destroy($category_id);

            if ($category) { //Check if data was deleted
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on ServicesRepository :'. $err->getMessage());
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
            $category = Services::withTrashed()->find($category_id)->restore();
            if ($category) { //Check if data was restored
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on ServicesRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}