<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Log;
use App\Model\Admin; 
use Validator;
use File;



class AdminController extends Controller
{

    public function index($value='')
    {
    	$data = array();
        $data['pageTitle'] = 'Dashboard';
        $data['totalUsers'] = 1;
        $data['mentors'] = 1;
        $data['fighters'] = 1;
        return view('admin.dashboard',$data);
    }

    public function showProfile()
    {
        try {
            $admin = Auth::user(); // Fetching Auth admin
            return view('admin.admin.profile', $admin); //Return response
        } catch(\Exception $err){
            Log::error('Error in showProfile on AdminController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $admin=Admin::find(Auth::user()->id);

            //dd($request);
            // Validate request
            $validator = Validator::make($request->all(), [
                'name' => 'string|required|min:4',
                'email'=>'required|email',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            // Return if validation failed
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            else{
                $oldimage=$admin->image;

                if(!empty($request->file('image')))
                {
                    $image = $request->file('image');
                    $image_ext = $image->getClientOriginalExtension();
                    $destinationImagePath = public_path().'/admin_image'; // upload path

                    if (!File::exists($destinationImagePath)){
                        File::makeDirectory($destinationImagePath);
                    } 

                    $image_nn = "Admin".time() . "." . $image_ext;
                    $image->move($destinationImagePath, $image_nn);
                    $admin->image = $image_nn;

                    $old_image_path = public_path() . '/admin_image/'.$oldimage;

                    if (File::exists($old_image_path)) {
                        File::delete($old_image_path); 
                    }
                }
                $admin->name = $request['name'];
                $admin->email = $request['email'];
                
                if($admin->save()) {
                    return redirect()->route('admin.showProfile')->with('success', 'Profile Updated Successfully.');
                }else{
                    return redirect()->route('admin.showProfile')->with('error', 'Profile Not Updated.');
                }
            }
        } catch(\Exception $err){
            Log::error('Error in updateProfile on AdminController :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


}
