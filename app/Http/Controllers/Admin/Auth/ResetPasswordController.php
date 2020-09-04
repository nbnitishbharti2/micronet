<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\AdminPasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
class ResetPasswordController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth:admin');
    }*/

    /*
        valdator for reset password
    */
    public function passwordResetValidateRules($data){
        $messages = [
            'password_confirmation.same' => 'Password does not match'
        ];

        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

       return $validator;
    }    


    /*
        validator for change password
    */
    public function passwordValidateRules($data){
        
        $messages = [
            'confirm_password.same' => 'Password does not match'
        ];

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',     
        ], $messages);

      return $validator;
    }    


    /* reset password */
    public function index(){
        return view('admin.auth.passwords.change-password');
    }

    /* change password post request*/
    public function changePassword(Request $reqeust){
        
        if(Auth::guard('admin')->check()){
            $requestData = $reqeust->All();
            $validator = $this->passwordValidateRules($requestData);

            if($validator->fails()){
               
                $response = [
                    'message' => 'Please fill all the required fields!',
                    'alert-type' => 'error'
                ];
                return redirect()->back()
                    ->withErrors($validator)
                    ->with($response);
            }else{

                $currentPassword = Auth::guard('admin')->user()->password;
               
                if(Hash::check($requestData['current_password'],$currentPassword)){
                    $id = Auth::guard('admin')->user()->id;
                    $admin = Admin::find($id);
                    $admin->password = Hash::make($requestData['new_password']);
                    $admin->save();

                    $response = [
                        'message' => 'Password is changed successfully.',
                        'alert-type' => 'success'
                    ];
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.auth.login')->with($response);   
                }else{

                    $response = [
                        'message' => 'Please enter correct password.',
                        'alert-type' => 'error'
                    ];

                    return redirect()->back()
                    ->with($response);

                }
                
            }
        }
    }


    /* reset pasword form */

    public function showResetForm(Request $request, $token = null)
    {
        //echo 'test';die;
        return view('admin.auth.passwords.resetforgotpassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /*reset password */

    public function reset(Request $request){
 
        $requestData = $request->All();
        $tokenDetails = AdminPasswordReset::where('email',$requestData['email'])->first();

        if(Hash::check($requestData['token'], $tokenDetails->token)){
            $validator = $this->passwordResetValidateRules($requestData);
             if($validator->fails()){
           
                $response = [
                    'message' => 'Please fill all the required fields!',
                    'alert-type' => 'error'
                ];
                return redirect()->back()
                    ->withErrors($validator)
                    ->with($response);
            }else{
                $userDetails =  Admin::where('email',$requestData['email'])->first();
                $userDetails->password = Hash::make($requestData['password']);
                $userDetails->save();

                $response = [
                    'message' => 'Password is reset successfully.',
                    'alert-type' => 'success'
                ];
                return redirect()->route('admin.auth.login')->with($response);     
                
            }
        }else{
            $response = [
                    'message' => 'Token has been expired please try again.',
                    'alert-type' => 'error'
                ];

                return redirect()->back()
                ->with($response);
        }
 
    }


}
