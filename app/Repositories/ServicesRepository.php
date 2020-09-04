<?php 

namespace App\Repositories;

use App\Model\Service;
use App\Model\SubCategory;
use App\Model\Type;
use App\Model\Category;
use App\Model\PriceByCity;
use App\Model\Booking;
use Log;
use Session;
use File;
use Auth;


class ServicesRepository {

    public function getAllServices($category_id)
    {
        try {  
            $services=Category::with(['sub_category','sub_category.service'])->find($category_id);
            return $services;
        } catch(\Exception $err){
            Log::error('message error in getAllServices on ServicesRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function getServiceDetail($service_id)
    {
        try {  
            $service=Service::with(['service_description','service_plan','service_plan.price_by_city'])->find($service_id);
            return $service;
        } catch(\Exception $err){
            Log::error('message error in getServiceDetail on ServicesRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }

    public function bookNow($service_id,$service_plan_id,$type_id,$category_id,$sub_category_id,$price_by_city_id)
    {
        try {  
            $res = array();

            $price_by_city = PriceByCity::find($price_by_city_id);
            $amount = $price_by_city->amount;

            $data = [
                'user_id'           => Auth::user()->id,
                'state_id'          => Auth::user()->state_id,
                'city_id'           => Auth::user()->city_id,
                'zip'               => Auth::user()->zip,
                'address'           => Auth::user()->address,
                'mobile'            => Auth::user()->mobile,
                'service_id'        => $service_id,
                'service_plan_id'   => $service_plan_id,
                'type_id'           => $type_id,
                'category_id'       => $category_id,
                'sub_category_id'   => $sub_category_id,
                'price_by_city_id'  => $price_by_city_id,
                'amount'            => $amount,
                'payment_status'    => 'Pending',
                'payment_mode'      => 'Cash',
                'status'            => 'New Booking',
                'booking_date'      => date('Y-m-d'),
            ];
            
            $booking = Booking::create($data);
            if ($booking->exists) {
               $res['status'] = 1;
               $res['message'] = 'Booking Successful.';
            } else {
               $res['status'] = 0;
               $res['message'] = 'Booking Unsuccessful.';
            }
            return response()->json($res);
        } catch(\Exception $err){
            Log::error('message error in bookNow on ServicesRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }



    
}