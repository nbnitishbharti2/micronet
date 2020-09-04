<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard();
    }


    public function showRegister()
    { 

        // $record = new User();
        // return view('auth.register',compact('record'));   
    }

    public function register(Request $request)  //RegisterRequest $RegisterRequest,User $user 
    {
        
        $res = array();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|Email|max:191|unique:users',
            'mobile' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users',
            'password' => ['required','string','min:8','confirmed'],    
            'password_confirmation'=> ['required','same:password'],
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'zip' => 'required|numeric|digits:6',
            'address' => "required|max:250",
            'aadhar' => "required|integer",
        ]);

        if($validator->fails()){
            $res['status'] = 0;
            $res['message'] = 'Please fill all the required fields!';
            return back()->withErrors($validator)->withInput()->with(['title'=>'Alert!','error'=>'Please fill all the required fields!', 'action'=>'register']);
        }


        $user = new User();
        $user->name      =  $request['name'];
        $user->email     =  $request['email'];
        $user->mobile    =  $request['mobile'];
        $user->password  =  Hash::make($request['password']);
        $user->state_id  =  $request['state_id'];
        $user->city_id   =  $request['city_id'];
        $user->zip       =  $request['zip'];
        $user->address   =  $request['address'];
        $user->aadhar    =  $request['aadhar'];
        $user->save();

        $res["status"]=1;
        $res["message"]="Registered successfully.";

        return response()->json($res);
        
    }
}
