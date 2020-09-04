<?php 

namespace App\Repositories;

use App\Model\User;
use Log;
use Auth;

class ChangePasswordRepository 
{

    
    public function changePassword()
    {
        try {
            $user = User::findOrFail(Auth::user()->id); //Fetch user data 
            $data = [
                'action'                     => route('updatePassword'),
                'page_title'                 => 'Change Password',
                'title'                      => 'Change Password',
                'user_id'                    => $user->id,
                'old_password'               => '',
                'newpassword'                => '',
                'newpassword_confirmation'   => '',
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in changePassword on ChangePasswordRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function updatePassword($request)
    {
        try {
            $user = User::findOrFail(Auth::guard('web')->user()->id);
            
            $newpassword = bcrypt($request->newpassword);
            $user->update(['password'=>$newpassword]);

            if ($user->wasChanged()) { //Check if data was updated
               return true;
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in updatePassword on ChangePasswordRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    

    
}