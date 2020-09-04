<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Service;
use App\Model\ServicePlan;
use App\Model\State;
use App\Model\City;
use Auth;



class PriceByCity extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'service_id', 'service_plan_id', 'state_id', 'city_id', 'amount' ];

    public $sortable = ['id', 'service_id', 'service_plan_id', 'state_id', 'city_id', 'amount','created_at', 'updated_at'];


    /**
     * Get the service that owns the price by city.
     */
    public function service()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Service', 'service_id')->withTrashed();
    }


    /**
     * Get the service plan that owns the price by city.
     */
    public function service_plan()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\ServicePlan', 'service_plan_id')->withTrashed();
    }


    /**
     * Get the state for the price by city.
     */
    public function state()
    {
        return $this->belongsTo('App\Model\State', 'state_id')->withTrashed();
    }


    /**
     * Get the city for the price by city.
     */
    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id')->withTrashed();
    }


    
    public static function getPriceByCity($service_id,$service_plan_id)
    {
        //dd($service_id);
        //dd($service_plan_id);
        //dd(auth::user()->city_id);
        $city_id = (auth::check()) ? auth::user()->city_id : 4;
        //dd($city_id);
        $price = PriceByCity::where('service_id',$service_id)->where('service_plan_id',$service_plan_id)->where('city_id',$city_id)->pluck('amount','id');
        //->get();
        //->toSql()
        //->pluck('amount','id');
        //dd($price);
        return $price;
    }



}
