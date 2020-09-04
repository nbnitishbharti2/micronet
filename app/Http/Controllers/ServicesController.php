<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ServicesRepository;
use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Type;
use Validator;
use Log;
use App;
use Session;
use Helper;



class ServicesController extends Controller
{
   	public function __construct(ServicesRepository $service)
	{
		$this->service = $service;
	}


	public function getAllServices($category_id)
	{
	    try {
	        $data['category'] = $this->service->getAllServices($category_id);
	        return view('home.services', $data);
	    } catch(\Exception $err){
	        Log::error('Error in getAllServices on ServicesController :'. $err->getMessage());
	        return back()->with('error', $err->getMessage());
	    }
	}

	public function getServiceDetail($service_id)
	{
	    try {
	        $data['service'] = $this->service->getServiceDetail($service_id);
	        return view('home.service_detail', $data);
	    } catch(\Exception $err){
	        Log::error('Error in getServiceDetail on ServicesController :'. $err->getMessage());
	        return back()->with('error', $err->getMessage());
	    }
	}

	public function bookNow(Request $request)
	{
		try {
		    $data = $this->service->bookNow($request->service_id, $request->service_plan_id, $request->type_id, $request->category_id, $request->sub_category_id, $request->price_by_city_id);
	        return $data;
	    } catch(\Exception $err){
	        Log::error('Error in bookNow on ServicesController :'. $err->getMessage());
	        return back()->with('error', $err->getMessage());
	    }
	}
	

	
}
