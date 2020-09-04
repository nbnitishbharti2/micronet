<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MyOrdersRepository;
//use App\Http\Requests\CategoryRequest;
use App\Model\Booking;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class MyOrdersController extends Controller
{
   	public function __construct(MyOrdersRepository $my_orders)
	{
		$this->my_orders = $my_orders;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function index()
	{
		try {
			$data['my_orders'] = $this->my_orders->getAllMyOrders(); // Fetch all my orders data
			return view('my_orders.index', $data);
		} catch(\Exception $err){
    		Log::error('Error in index on MyOrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	

	
}
