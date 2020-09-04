<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\TransactionsRepository;
use App\Http\Requests\Admin\SettleRequest;
use App\Model\Booking;
use App\Model\BookingTransaction;
use Validator;
use Auth;
use Log;
use App;
use Session;
use Helper;



class TransactionsController extends Controller
{
   	public function __construct(TransactionsRepository $transactions)
	{
		$this->transactions = $transactions;
	}



	public function transactions(Request $request)  
	{
		try {
			$data['transactions'] = $this->transactions->transactions($request); // Fetch all transactions data 
			return view('admin.transactions.transactions', $data);
		} catch(\Exception $err){
    		Log::error('Error in transactions on TransactionsController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}



	public function unsettledTransactions()
	{
		try {
			$data['transactions'] = $this->transactions->unsettledTransactions(); // Fetch all transactions data 
			return view('admin.transactions.unsettled_transactions', $data);
		} catch(\Exception $err){
    		Log::error('Error in unsettledTransactions on TransactionsController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	public function settle(SettleRequest $request)
	{
		try {
			$data = $this->transactions->settle($request); // Fetch all transactions data 
			//dd($data);
			return view('admin.transactions.unsettle_transactions_to_partner', $data);
		} catch(\Exception $err){
    		Log::error('Error in settle on TransactionsController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
	public function settleTransactions(Request $request)
	{
		try {
			$data = $this->transactions->settleTransactions($request); // Fetch all transactions data 
			return redirect()->route('admin.unsettled-transactions')->with('success','Setteled Successfully.');
		} catch(\Exception $err){
    		Log::error('Error in settleTransactions on TransactionsController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}

	
	public function getAllSettleTransactions(Request $request)
	{
		try {
			$data['settle_transactions'] = $this->transactions->getAllSettleTransactions($request); // Fetch all transactions data 
			return view('admin.transactions.settle_transactions', $data);
		} catch(\Exception $err){
    		Log::error('Error in getAllSettleTransactions on TransactionsController :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
	}


	

	
}
