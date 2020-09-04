<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
      /* public function __construct()
       {
    
           //$this->middleware('guest:admin')->except('logout');
       }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }
	
    public function loginAdmin(Request $request)
    {
      
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
     
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
      }
	 
      // if unsuccessful, then redirect back to the login with the form data
		$notification = [
			'message' => 'Invalid Login Credentials!!!',
			'alert-type' => 'error'
		];
      return redirect()->back()->withInput($request->only('email', 'remember'))->with($notification);
    }
    public function logout()
    { 
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
