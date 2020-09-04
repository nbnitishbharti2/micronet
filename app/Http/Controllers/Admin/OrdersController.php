<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\OrdersRepository;
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



	public function newOrders()
	{
		try {
			$data['new_orders'] = $this->orders->getAllNewOrders(); // Fetch all new orders data 
			return view('admin.orders.new_orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in newOrders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	public function partnerAssign($id)
	{
		try {
			$data = $this->orders->partnerAssign($id); // Display data
			return view('admin.orders.partner_assign', $data);
		} catch(\Exception $err){
    		Log::error('Error in partnerAssign on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	public function assign($booking_id, $partner_id)
	{
		try {
			$data = $this->orders->assign($booking_id, $partner_id); 
			return redirect()->route('admin.new-orders')->with('success','Partner assigned successfully.');
		} catch(\Exception $err){
    		Log::error('Error in partnerAssign on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	


	public function Orders()
	{
		try {
			$data['orders'] = $this->orders->getAllOrders(); // Fetch all orders data 
			return view('admin.orders.orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in Orders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	public function completedOrders()
	{
		try {
			$data['completed_orders'] = $this->orders->completedOrders(); // Fetch all completed orders data 
			return view('admin.orders.completed_orders', $data);
		} catch(\Exception $err){
    		Log::error('Error in completedOrders on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}



	public function transactions()
	{
		try {
			$data['transactions'] = $this->orders->transactions(); // Fetch all transactions data 
			return view('admin.transactions.transactions', $data);
		} catch(\Exception $err){
    		Log::error('Error in transactions on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	public function unsettledTransactions()
	{
		try {
			$data['transactions'] = $this->orders->unsettledTransactions(); // Fetch all transactions data 
			return view('admin.transactions.unsettled_transactions', $data);
		} catch(\Exception $err){
    		Log::error('Error in unsettledTransactions on OrdersController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	

	
}
