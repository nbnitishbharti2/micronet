<?php 

namespace App\Repositories;

use App\Model\User;
use App\Model\City;
use App\Model\State;
use Log;
use Auth;
use Session;
use File;

class UserRepository 
{

    
    public function editProfile()
    {
        try {
            $user = User::with(['state','city'])->findOrFail(Auth::user()->id); //Fetch user data 
            $data = [
                'action'          => route('updateProfile'),
                'page_title'      => 'Edit Profile',
                'title'           => 'Edit Profile',
                'user_id'         => $user->id,
                'name'            => ($user->name) ? $user->name : old('name'),
                'email'           => ($user->email) ? $user->email : old('email'),
                'mobile'          => ($user->mobile) ? $user->mobile : old('mobile'),
                'state_id'        => $user->state->id,
                'city_id'         => $user->city->id,
                'zip'             => ($user->zip) ? $user->zip : old('zip'),
                'address'         => ($user->address) ? $user->address : old('address'),
                'aadhar'          => ($user->aadhar) ? $user->aadhar : old('aadhar'),
                'image'           => $user->image,
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in editProfile on UserRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function updateProfile($request)
    { 
        try {
            $user  = User::with(['state','city'])->findOrFail(Auth::user()->id); //Fetch user data
            $oldimage=$user->image;

            if(!empty($request->file('image')))
            {
                $image = $request->file('image');
                $image_ext = $image->getClientOriginalExtension();
                $destinationImagePath = public_path().'/user_image'; // upload path

                if (!File::exists($destinationImagePath)){
                    File::makeDirectory($destinationImagePath);
                } 

                $image_nn = "User".time().".".$image_ext;
                $image->move($destinationImagePath, $image_nn);
                $user->image = $image_nn;

                $old_image_path = public_path().'/user_image/'.$oldimage;

                if (File::exists($old_image_path)) {
                    File::delete($old_image_path); 
                }
            }

            $user->name  = $request->name;
            $user->email  = $request->email;
            $user->mobile  = $request->mobile;
            $user->state_id  = $request->state_id;
            $user->city_id  = $request->city_id;
            $user->zip  = $request->zip;
            $user->address  = $request->address;
            $user->aadhar  = $request->aadhar;
            $user->save(); // Update data
            if ($user->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in updateProfile on UserRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    

    
}