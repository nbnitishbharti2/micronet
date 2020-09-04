<?php 

namespace App\Repositories\Admin;

use App\Model\Setting;
use Log;
use Session;

class SettingRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllSetting()
    {
    	try {
    		return  $query = Setting::get();  
    	} catch(\Exception $err){
    		Log::error('message error in getAllsetting on SettingRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }

    /**
    * Method to fetch edit resource data
    * @param int $setting_id
    * @return array $data
    */
    public function edit($setting_id)
    {
        try {
            $setting = Setting::findOrFail($setting_id); //Fetch setting data 
            $data = [
                'action'          =>  route('admin.update.setting'),
                'page_title'      =>  'Setting',
                'title'           =>  'Edit Setting',
                'setting_id'      =>  $setting->id,
                'email'           =>  ($setting->email) ? $setting->email : old('naemailme'),
                'mobile'          =>  ($setting->mobile) ? $setting->mobile : old('mobile'),
                'address'         =>  ($setting->address) ? $setting->address : old('address'),
                'zip'             =>  ($setting->zip) ? $setting->zip : old('zip'),
                'commission'      =>  ($setting->commission) ? $setting->commission : old('commission'),
            ];
            return $data;
        } catch(\Exception $err){ 
            Log::error('message error in edit on SettingRepository :'. $err->getMessage());
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
            $setting  = Setting::findOrFail($request->setting_id); //Fetch setting data
            
            $setting->email       = $request->email;
            $setting->mobile      = $request->mobile;
            $setting->address     = $request->address;
            $setting->zip         = $request->zip;
            $setting->commission  = $request->commission;
            $setting->save(); // Update data
            if ($setting->wasChanged()) { //Check if data was updated
                return true; 
            } else {
               return false;
            }
        } catch(\Exception $err){
            Log::error('message error in update on SettingRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
    
}