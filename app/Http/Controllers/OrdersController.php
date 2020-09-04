<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\OrdersRepository;
use App\Model\Booking;
use App\Model\BookingTransaction;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class OrdersController extends Controller
{
   	public function __construct(OrdersRepository $orders)
	{
		$this->orders = $orders;
	}

	/**
    * Method for show list of resources
    * 
    * @return Illuminate\Http\Response
    */
	public function myOrders()
	{
		try {
			$data['my_orders'] = $this->orders->getAllMyOrders(); // Fetch all my orders data for user
			return view('orders.my_orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in myOrders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}



	public function newOrders()
	{
		try {
			$data['new_orders'] = $this->orders->getAllNewOrders(); // Fetch all new orders data for partner
			return view('orders.new_orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in newOrders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	public function paymentComplete($id)
	{
		try {
			$data['payment_complete'] = $this->orders->paymentComplete($id); // Payment complete
			return redirect()->back()->with(['data'=>$data, 'success'=>'Payment Completed successfully!']);
		} catch(\Exception $err){
    		Log::error('Error in paymentComplete on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	public function complete($id)
	{
		try {
			$data['complete'] = $this->orders->complete($id); // Status complete
			return redirect()->back()->with(['data'=>$data, 'success'=>'Status changed to Completed successfully!']);
		} catch(\Exception $err){
    		Log::error('Error in complete on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}



	public function Orders()
	{
		try {
			$data['orders'] = $this->orders->getAllOrders(); // Fetch all orders data for partner
			return view('orders.orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in Orders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	public function Payments()
	{
		try {
			$data['payments'] = $this->orders->getAllPayments(); // Fetch all orders data for partner
			return view('orders.payments', $data);
		} catch(\Exception $err){
    		Log::error('Error in Payments on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	

	
}
