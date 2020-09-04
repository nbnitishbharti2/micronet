<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Model\State;
use Validator;
use Auth;
use Log;
use App;
use Helper;
use Session;
use File;


class UserController extends Controller
{
    
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function editProfile()
    {

        try {
            $data = $this->user->editProfile();
            return view('users.profile-edit', $data);
        } catch(\Exception $err){
            
            Log::error('Error in editProfile on UserController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function updateProfile(UserRequest $request)
    {
        try {
            $result = $this->user->updateProfile($request);
            if($result == true) {
                return redirect()->route('editProfile')->with('success', 'User updated successfully!');
            }
            return back()->with('error', 'Oops! User not updated.');
        } catch(\Exception $err){
            Log::error('Error in updateProfile on UserController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


}
