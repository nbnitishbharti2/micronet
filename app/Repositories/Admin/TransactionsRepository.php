<?php 

namespace App\Repositories\Admin;

use App\Model\Booking;
use App\Model\BookingTransaction;
use App\Model\PriceByCity;
use App\Model\Partner;
use App\Model\User;
use App\Model\Setting;
use App\Model\SettleTransaction;
use Log;
use Session;
use File;
use Auth;



class TransactionsRepository {


    public function transactions($request)
    {
        try {
                $partner = null;
                $settle_status = null;
                $date1 = null;
                $date2 = null;

                $query = BookingTransaction::with(['user','partner','booking'])->get();

                if(isset($request->partner)){
                    $partner=$request->partner;
                    $query = $query->where('partner_id', '=', $partner); 
                }
                if(isset($request->settle_status)){
                    $settle_status=$request->settle_status;
                    if($settle_status == 'Settled'){
                        $settle_status = '1';
                    }else{
                        $settle_status = '0';
                    }
                    $query = $query->where('settle_status', '=', $settle_status); 
                }
                if(isset($request->date1) && isset($request->date2)){
                    $date1=date('Y-m-d',strtotime($request->date1));
                    $date2=date('Y-m-d',strtotime($request->date2));
                    $query = $query->whereBetween('created_at', [$date1,$date2]); 
                }
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in transactions on TransactionsRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function unsettledTransactions()
    {
        try {
                $query = BookingTransaction::with(['user','partner','booking'])->where('settle_status','0')->get();
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in unsettledTransactions on TransactionsRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    public function settle($request)
    {
        try {
                $unsettled_records = BookingTransaction::where(['settle_status'=>'0'])->get();

                
                if(count($unsettled_records) > 0){

                    $sum_1 = 0;
                    foreach($unsettled_records as $unsettled_record)
                    {
                        $sum_1 = $sum_1 + $unsettled_record->amount;
                    }
                    
                    $total_unsettled_amount = $sum_1;

                    $unsettled_records_to_partner = BookingTransaction::where('partner_id',$request->partner_id)->where('payment_2','Partner')->where('settle_status','0')->get();

                    $sum_2 = 0;
                    $ids =array();
                    foreach($unsettled_records_to_partner as $unsettled_record_to_partner)
                    {   
                        $ids[] = $unsettled_record_to_partner->id;
                        $sum_2 = $sum_2 + $unsettled_record_to_partner->amount;
                    }
            
                    $total_unsettled_amount_to_partner = $sum_2;

                    $unsettled_records_to_admin = BookingTransaction::where(['payment_2'=>'Admin', 'settle_status'=>'0'])->get();

                    $sum_3 = 0;
                    foreach($unsettled_records_to_admin as $unsettled_record_to_admin)
                    {
                        $sum_3 = $sum_3 + $unsettled_record_to_admin->amount;
                    }
                    
                    $total_unsettled_amount_to_admin = $sum_3;

                    $setting = Setting::find(1);
                    $commission =$setting->commission;
                    

                    $total_commission = ($total_unsettled_amount * $commission) / (100);
                    
                    $payment_flow = $total_unsettled_amount_to_partner - $total_commission;
                    

                    if($payment_flow > 0){
                        $payment_flow_type = 'Dr';
                    }else{
                        $payment_flow_type = 'Cr';
                    }

                    $query = array();
                    $query['ids'] = implode(',',$ids);
                    $query['partner_id'] = $request->partner_id;
                    $query['partner_name'] = User::where('id',$request->partner_id)->first('name');
                    $query['total_unsettled_amount'] = $total_unsettled_amount;
                    $query['total_unsettled_amount_to_partner'] = $total_unsettled_amount_to_partner;
                    $query['total_unsettled_amount_to_admin'] = $total_unsettled_amount_to_admin;
                    $query['total_commission'] = $total_commission;
                    $query['payment_flow_type'] = $payment_flow_type;
                    $query['payment_flow'] = $payment_flow;

                    return $query;
                }else{
                    //return false;

                    $query['ids'] = '0';
                    $query['partner_id'] = '0';
                    $query['partner_name'] = '0';
                    $query['total_unsettled_amount'] = '0';
                    $query['total_unsettled_amount_to_partner'] = '0';
                    $query['total_unsettled_amount_to_admin'] = '0';
                    $query['total_commission'] = '0';
                    $query['payment_flow_type'] = '0';
                    $query['payment_flow'] = '0';
                }
        } catch(\Exception $err){
            Log::error('message error in settle on TransactionsRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
    public function settleTransactions($request)
    {
        try {
            $ids=explode(',',$request->ids);

            $updateSettleStatus = BookingTransaction::whereIn('id',$ids)
            ->update(['settle_status' => '1']);  // 1 means setteled

            if($updateSettleStatus){
                $data = [
                    'partner_id' => $request->partner_id,
                    'total_unsettled_amount' => $request->total_unsettled_amount,
                    'total_unsettled_amount_to_partner' => $request->total_unsettled_amount_to_partner,
                    'total_unsettled_amount_to_admin' => $request->total_unsettled_amount_to_admin,
                    'total_commission' => $request->total_commission,
                    'settle_status' => '1',
                    'payment_flow_type' => $request->payment_flow_type,
                    'payment_flow' => $request->payment_flow,
                ];

                $settle_transaction = SettleTransaction::create($data);
                if($settle_transaction->exists()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            } 
        } catch(\Exception $err){
            Log::error('message error in settleTransactions on TransactionsRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }


    
    public function getAllSettleTransactions($request)
    {
        try {

                $partner = null;
                $settle_status = null;
                $date1 = null;
                $date2 = null;

                $query = SettleTransaction::with(['partner'])->where(['settle_status'=>'1'])->get();
                if(isset($request->partner)){
                    $partner=$request->partner;
                    $query = $query->where('partner_id', '=', $partner); 
                }
                if(isset($request->settle_status)){
                    $settle_status=$request->settle_status;
                    if($settle_status == 'Settled'){
                        $settle_status = '1';
                    }else{
                        $settle_status = '0';
                    }
                    $query = $query->where('settle_status', '=', $settle_status); 
                }
                if(isset($request->date1) && isset($request->date2)){
                    $date1=date('Y-m-d',strtotime($request->date1));
                    $date2=date('Y-m-d',strtotime($request->date2));
                    $query = $query->whereBetween('created_at', [$date1,$date2]); 
                }
                return $query; 
        } catch(\Exception $err){
            Log::error('message error in getAllSettleTransactions on TransactionsRepository :'. $err->getMessage());
            return back()->with('error', $err->getMessage());
        }
    }
    

    
}