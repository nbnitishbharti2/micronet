<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Type;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Service;
use App\Model\PriceByCity;


class ServicePlan extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'type_id', 'category_id', 'sub_category_id', 'service_id' ];

    public $sortable = ['id', 'name', 'type_id', 'category_id', 'sub_category_id', 'service_id', 'created_at', 'updated_at'];




    /**
     * Get the type that owns the service plan.
     */
    public function type()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Type', 'type_id')->withTrashed();
    }


    /**
     * Get the category that owns the service plan.
     */
    public function category()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Category', 'category_id')->withTrashed();
    }


    /**
     * Get the sub category that owns the service plan.
     */
    public function sub_category()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\SubCategory', 'sub_category_id')->withTrashed();
    }


    /**
     * Get the service for the service plan.
     */
    public function service()
    {
        return $this->belongsTo('App\Model\Service', 'service_id', 'id');
    }

    /**
     * Get the service for the service plan.
     */
    public function price_by_city()
    {
        return $this->hasMany('App\Model\PriceByCity');
    }


    /*
    * Get the service plan list for listing.
    */
    public static function getAllServicePlanForListing()
    {
    	return Service::select('service_plans.id', 'service_plans.name')->get();
    }

}
