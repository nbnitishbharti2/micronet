<?php 

namespace App\Repositories;

use App\Model\Booking;
use App\Model\BookingTransaction;
use Log;
use Session;
use File;
use Auth;

class OrdersRepository {

    /**
    * Method to fetch all resource data
    *
    * @return Collection $query
    */
    public function getAllMyOrders()
    {
    	try {
    		return  $query = Booking::with(['state','city','service','service_plan'])->where('user_id',Auth::user()->id)->withTrashed()->paginate(10);  
    	} catch(\Exception $err){
    		Log::error('message error in getAllMyOrders on OrdersRepository :'. $err->getMessage());
    		return back()->with('error', $err->getMessage());
    	}
    }


    public function getAllNewOrders()
    {
        try {
                $query = Booking::with(['state','city','service','service_plan'])->where('status','Partner Assigned')->orWhere('payment_status','Pending')->where(['user_id'=>Auth::user()->id])->withTrashed()->paginate(10);
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllMyOrders on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function paymentComplete($id)
    {
        try {
                $booking = Booking::find($id);
                
                $booking->payment_status = 'Completed';
                $booking->payment_mode = 'Cash';
                $booking->payment_2 = 'Partner';
                $booking->payment_date = date('Y-m-d');
                if($booking->save()){
                    $data = [
                        'user_id'    => $booking->user_id,
                        'booking_id'    => $booking->id,
                        'partner_id'    => Auth::user()->id,
                        'payment_mode'  => 'Cash',
                        'payment_2'    => 'Partner',
                        'settle_status'    => '0',  //settled
                        'amount'    => $booking->amount,
                    ];
                    
                    $booking_transaction = BookingTransaction::create($data);
                    if ($booking_transaction->exists) {
                       return true;
                    } else {
                       return false;
                    }
                } 
        } catch(\Exception $err){
            Log::error('message error in paymentComplete on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function complete($id)
    {
        try {
                $booking = Booking::find($id);
                
                $booking->status = 'Completed';
                $booking->service_date = date('Y-m-d');
                if($booking->save()){
                   return true;
                } else {
                   return false;
                } 
        } catch(\Exception $err){
            Log::error('message error in complete on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }



    public function getAllOrders()
    {
        try {
                $query = Booking::with(['state','city','service','service_plan'])->where('status','Completed')->orWhere('payment_status','Completed')->where(['user_id'=>Auth::user()->id])->withTrashed()->paginate(10);
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllOrders on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function getAllPayments()
    {
        try {
                $query = BookingTransaction::where('partner_id',Auth::user()->id)->paginate(10);
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllPayments on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    

    
}