<?php 

namespace App\Repositories\Admin;

use App\Model\Booking;
use App\Model\BookingTransaction;
use App\Model\PriceByCity;
use App\Model\Partner;
use App\Model\User;
use Log;
use Session;
use File;
use Auth;

class OrdersRepository {

    public function getAllNewOrders()
    {
        try {
                $query = Booking::with(['state','city','service','service_plan'])->where('status','New Booking')->withTrashed()->get();
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllMyOrders on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    
    public function partnerAssign($id)
    {
        try {
                $booking= Booking::with(['user','state','city','service','service_plan'])->find($id);
            
                $service_id = $booking->service_id;

                $partners = Partner::with('partnerService')->whereHas('partnerService',function($q) use ($service_id) {
                    $q->where('service_id', $service_id);
                })->pluck('email')->toArray();

                $users_as_partners = User::whereIn('email',$partners)->get();

                $query['booking'] = $booking;
                $query['users_as_partners'] = $users_as_partners;

                return $query; 
        } catch(\Exception $err){
            Log::error('message error in partnerAssign on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }



    public function assign($booking_id, $partner_id)
    {
        try {
                $booking= Booking::with(['user','state','city','service','service_plan'])->find($booking_id);
                $booking->partner_id = $partner_id;
                $booking->status = 'Partner Assigned';
                $booking->save();

                if($booking->exists()){
                    return true;
                }else{
                    return false;
                }
        } catch(\Exception $err){
            Log::error('message error in assign on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }  


    public function getAllOrders()
    {
        try {
                $query = Booking::with(['state','city','service','service_plan'])->where('status','Partner Assigned')->withTrashed()->get();
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllOrders on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
    public function completedOrders()
    {
        try {
                $query = Booking::with(['state','city','service','service_plan'])->where('status','Completed')->withTrashed()->get();
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in completedOrders on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function transactions()
    {
        try {
                $query = BookingTransaction::with(['user','partner','booking'])->get();
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in transactions on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function unsettledTransactions()
    {
        try {
                $query = BookingTransaction::with(['user','partner','booking'])->where('settle_status','0')->get();   
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in unsettledTransactions on OrdersRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    

    
}