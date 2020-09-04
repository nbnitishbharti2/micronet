<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Model\User;
use App\Model\State;
use App\Model\City;
use App\Model\Service;
use App\Model\SericePlan;



class Booking extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'user_id', 'state_id', 'city_id', 'zip', 'address', 'mobile', 'service_id', 'service_plan_id', 'type_id', 'category_id', 'sub_category_id', 'price_by_city_id', 'amount', 'payment_status', 'payment_mode', 'payment_2', 'status', 'booking_date', 'confirmation_date', 'service_date', 'payment_date', 'agent_id' ];

    public $sortable = ['id', 'user_id', 'state_id', 'city_id', 'zip', 'address', 'mobile', 'service_id', 'service_plan_id', 'type_id', 'category_id', 'sub_category_id', 'price_by_city_id', 'amount', 'payment_status', 'payment_mode', 'payment_2', 'status', 'booking_date', 'confirmation_date', 'service_date', 'payment_date', 'agent_id', 'created_at', 'updated_at'];



    /**
     * Get the User that owns the booking.
     */
    public function user()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    /**
     * Get the State that owns the booking.
     */
    public function state()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\State', 'state_id')->withTrashed();
    }


    /**
     * Get the City that owns the booking.
     */
    public function city()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\City', 'city_id')->withTrashed();
    }

    /**
     * Get the Service that owns the booking.
     */
    public function service()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Service', 'service_id')->withTrashed();
    }


    /**
     * Get the Service Plan that owns the booking.
     */
    public function service_plan()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\ServicePlan', 'service_plan_id')->withTrashed();
    }



}
