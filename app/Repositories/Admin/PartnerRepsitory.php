<?php 

namespace App\Repositories\Admin;

use App\Model\Partner;
use App\Model\User;
use App\Model\PartnerService;
use App\Model\Service;
use App\Model\State;
use App\Model\City;
use Illuminate\Support\Facades\Hash;
use Log;
use Session;
use File;

class PartnerRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllPartner()
    {
    	try {
    		return  $query = Partner::withTrashed()->get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllPartner on PartnerRepository :'. $err->getMessage());
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
        $service_ids = array();
        try {
            $data = [
                'action'          => route('admin.store.partner'),
                'page_title'      => 'Partner',
                'title'           => 'Add Partner',
                'partner_id'      => 0,
                'name'            => (old('name')) ? old('name') : '',
                'email'           => (old('email')) ? old('email') : '',
                'password'        => '',
                'mobile'          => (old('mobile')) ? old('mobile') : '',
                'state_list'      => State::getAllStateForListing(),
                'state_id'        => 0,
                'city_id'         => 0,
                'zip'             => (old('zip')) ? old('zip') : '',
                'address'         => (old('address')) ? old('address') : '',
                'aadhar'          => (old('aadhar')) ? old('aadhar') : '',
                'image'           => '',
                'service_list'    => Service::getAllServiceForListing(),
                'service_ids'     => $service_ids,
            ];
            return $data;
        } catch(\Exception $err){
            Log::error('message error in create on PartnerRepository :'. $err->getMessage());
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
            if(!empty($request->file('image'))){
                $image = $request->file('image');
                $image_ext = $image->getClientOriginalExtension();
                $destinationPartnerImagePath = public_path().'/partner_image'; // upload path

                if (!File::exists($destinationPartnerImagePath)){
                    File::makeDirectory($destinationPartnerImagePath);
                } 

                $destinationUserImagePath = public_path().'/user_image'; // upload path

                if (!File::exists($destinationUserImagePath)){
                    File::makeDirectory($destinationUserImagePath);
                } 

                $image_nn = "Partner".time().".".$image_ext;

                $image->move($destinationPartnerImagePath, $image_nn);
                \File::copy($destinationPartnerImagePath.'/'.$image_nn, public_path('user_image/').$image_nn);
            }
            
            

            $data = [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'mobile'   => $request->mobile,
                'state_id' => $request->state_id,
                'city_id'  => $request->city_id,
                'zip'      => $request->zip,
                'address'  => $request->address,
                'aadhar'   => $request->aadhar,
                'image'    => ($image_nn) ? $image_nn : '',
            ];

            $user_data = [
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'mobile'    => $request->mobile,
                'state_id'  => $request->state_id,
                'city_id'   => $request->city_id,
                'zip'       => $request->zip,
                'address'   => $request->address,
                'aadhar'    => $request->aadhar,
                'image'     => ($image_nn) ? $image_nn : '',
                'user_type' => 'Partner',
                'status'    => 'Active',
            ];
            
            $partner = Partner::create($data);
            if ($partner->exists) {
                //save partner in user table
                $user = User::create($user_data);

                //Partner services
                $new_data=array(); 
                foreach ($request->service_ids as $key => $value) {
                    $new_record=array();
                    $new_record['partner_id']=$partner->id;
                    $new_record['service_id']=$value;
                    array_push($new_data,$new_record);
                }
                $partner_services = PartnerService::insert($new_data); 
                if($partner_services){
                    return true;
                } else {
                    return false;  
                }
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in store on PartnerRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to fetch edit resource data
    * @param int $partner_id
    * @return array $data
    */
    public function edit($partner_id)
    {
        try {
            $service_ids = PartnerService::where(['partner_id'=>$partner_id])->pluck('service_id')->toArray();
            
            $partner = Partner::findOrFail($partner_id); //Fetch partner data 
            $data = [
                'action'          =>  route('admin.update.partner'),
                'page_title'      =>  'Partner',
                'title'           =>  'Edit Partner',
                'partner_id'      =>  $partner->id,
                'name'            =>  ($partner->name) ? $partner->name : old('name'),
                'email'           =>  ($partner->email) ? $partner->email : old('naemailme'),
                'password'        =>  '',
                'mobile'          =>  ($partner->mobile) ? $partner->mobile : old('mobile'),
                'state_list'      =>  State::getAllStateForListing(),
                'state_id'        =>  $partner->state->id,
                'city_id'         =>  $partner->city->id,
                'zip'             =>  ($partner->zip) ? $partner->zip : old('zip'),
                'address'         =>  ($partner->address) ? $partner->address : old('address'),
                'aadhar'          =>  ($partner->aadhar) ? $partner->aadhar : old('aadhar'),
                'image'           =>  $partner->image,
                'service_list'    =>  Service::getAllServiceForListing(),
                'service_ids'     =>  $service_ids, 
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on PartnerRepository :'. $err->getMessage());
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
            $partner  = Partner::findOrFail($request->partner_id); //Fetch partner data
            $user = User::where('email',$partner->email)->first(); //Fetch user data
            $oldimage=$partner->image;

            $old_service_ids = PartnerService::where(['partner_id'=>$request->partner_id])->pluck('service_id','service_id')->toArray(); //old service ids
    
            $service_ids=$request->service_ids; //current requested service ids
            
            $remove_service_ids=array_diff($old_service_ids,$service_ids);
            
            $new_service_ids=array_diff($service_ids,$old_service_ids);//service ids to be inserted
           
            //Remove month ids
            $removed_service_ids = PartnerService::where(['partner_id'=>$request->partner_id])->whereIn('service_id',$remove_service_ids)->delete(); 

            //Add month ids
            $new_data=array(); 
            foreach ($new_service_ids as $key => $value) {
                $new_record=array();
                $new_record['partner_id']=$request->partner_id;
                $new_record['service_id']=$value;
                array_push($new_data,$new_record);
            }
            $partner_services = PartnerService::insert($new_data); 

            if(!empty($request->file('image')))
            {
                $image = $request->file('image');
                
                $image_ext = $image->getClientOriginalExtension();
               

                $destinationPartnerImagePath = public_path().'/partner_image'; // upload path

                if (!File::exists($destinationPartnerImagePath)){
                    File::makeDirectory($destinationPartnerImagePath);
                } 

                $destinationUserImagePath = public_path().'/user_image'; // upload path

                if (!File::exists($destinationUserImagePath)){
                    File::makeDirectory($destinationUserImagePath);
                } 

                $image_nn = "Partner".time().".".$image_ext;
                

                // $image->move($destinationPartnerImagePath, $image_nn);
                // $image->move($destinationUserImagePath, $image_nn);

                $image->move($destinationPartnerImagePath, $image_nn);
                \File::copy($destinationPartnerImagePath.'/'.$image_nn, public_path('user_image/').$image_nn);

                $partner->image = ($image_nn) ? $image_nn : '';
                $user->image = ($image_nn) ? $image_nn : '';

                $old_partner_image_path = public_path().'/partner_image/'.$oldimage;

                if (File::exists($old_partner_image_path)) {
                    File::delete($old_partner_image_path); 
                }

                $old_user_image_path = public_path().'/user_image/'.$oldimage;

                if (File::exists($old_user_image_path)) {
                    File::delete($old_user_image_path); 
                }
            }

            if(isset($request->password))
            {
                $partner->password  = Hash::make($request->password);
                $user->password  = Hash::make($request->password);
            }


            $partner->name       = $request->name;
            $partner->email      = $request->email;
            $partner->mobile     = $request->mobile;
            $partner->state_id   = $request->state_id;
            $partner->city_id    = $request->city_id;
            $partner->zip        = $request->zip;
            $partner->address    = $request->address;
            $partner->aadhar     = $request->aadhar;

            $partner->save(); // Update data
            if ($partner->wasChanged() || $removed_service_ids || $partner_services) { //Check if data was updated
                
                $user->name       = $request->name;
                $user->email      = $request->email;
                $user->mobile     = $request->mobile;
                $user->state_id   = $request->state_id;
                $user->city_id    = $request->city_id;
                $user->zip        = $request->zip;
                $user->address    = $request->address;
                $user->aadhar     = $request->aadhar;
                $user->save();
                return true; 
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on PartnerRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function delete($partner_id)
    {
        try {
            $get_partner = Partner::find($partner_id);
            $partner_email = $get_partner->email;
            
            $partner = Partner::destroy($partner_id);

            if ($partner) { //Check if data was deleted
                $user = User::where('email',$partner_email)->first(); //Fetch user data
                $user->status = 'Deleted';
                $user->save();
                return true;
            } else {
                return false;
            }
        } catch(\Exception $err){
            Log::error('message error in delete on PartnerRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    /**
    * Method to delete resource
    * @param Illuminate\Http\Request
    * @return boolean
    */
    public function restore($partner_id)
    {
        try {
            $get_partner = Partner::withTrashed()->find($partner_id);
            $partner_email = $get_partner->email;

            $partner = Partner::withTrashed()->find($partner_id)->restore();
            if ($partner) { //Check if data was restored
                $user = User::where('email',$partner_email)->first(); //Fetch user data
                $user->status = 'Active';
                $user->save();
                return true;
            } else {
                return false;
            }
        } catch(\Exception $err){
            Log::error('message error in restore on PartnerRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
}