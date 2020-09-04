<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\SettingRepository;
use App\Http\Requests\Admin\SettingRequest;
use App\Model\Setting;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class SettingController extends Controller
{
   	public function __construct(SettingRepository $setting)
	{
		$this->setting = $setting;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['setting'] = $this->setting->getAllSetting(); // Fetch all setting data
			return view('admin.setting.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on SettingController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	/**
	* Method to show form for edit resource
	* @param int $setting_id
	* @return Illuminate\Http\Response
	*/
	public function edit($setting_id = 0)
	{
		try {
			if($setting_id == 0){
				return back()->with('error', 'Oops! Setting not found.');
			}
			$data = $this->setting->edit($setting_id);
			return view('admin.setting.form', $data);
		} catch(\Exception $err){
    		Log::error('Error in edit on SettingController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	/**
	* Method to update resource
	* @param Illuminate\Http\Request
	* @return Illuminate\Http\Response
	*/
	public function update(SettingRequest $request)
	{
		try {
			$result = $this->setting->update($request);
			if($result == true) {
				return redirect()->route('admin.view.setting')->with('success', 'Setting updated successfully!');
			}
			return back()->with('error', 'Oops! Setting not updated.');
		} catch(\Exception $err){
			Log::error('Error in update on SettingController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	
}
