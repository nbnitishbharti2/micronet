<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChangePasswordRepository;
use App\Http\Requests\ChangePasswordRequest;
use Validator;
use Auth;
use Log;
//use App;
use Helper;


class ChangePasswordController extends Controller
{
    
    public function __construct(ChangePasswordRepository $user)
    {
        $this->user = $user;
    }


    public function changePassword()
    {

        try {
            $data = $this->user->changePassword();
            return view('change_password.index', $data);
        } catch(\Exception $err){
            
            Log::error('Error in changePassword on ChangePasswordController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        try {
            $result = $this->user->updatePassword($request);
            if($result == true) {
                return redirect()->route('changePassword')->with('success', 'Password changed successfully!');
            }
            return back()->with('error', 'Oops! Password not changed.');
        } catch(\Exception $err){
            Log::error('Error in updatePassword on ChangePasswordController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


}
