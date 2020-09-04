<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Type;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\ServiceDescription;
use App\Model\ServicePlan;



class Service extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'image', 'type_id', 'category_id', 'sub_category_id' ];

    public $sortable = ['id', 'name', 'type_id', 'category_id', 'sub_category_id', 'created_at', 'updated_at'];




    /**
     * Get the type that owns the service.
     */
    public function type()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Type', 'type_id')->withTrashed();
    }


    /**
     * Get the category that owns the service.
     */
    public function category()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Category', 'category_id')->withTrashed();
    }


    /**
     * Get the sub category that owns the service.
     */
    public function sub_category()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\SubCategory', 'sub_category_id')->withTrashed();
    }

    /**
     * Get the service description.
     */
    public function service_description()
    {
        //Deleted record is required here
        return $this->hasOne('App\Model\ServiceDescription');
    }

    /**
     * Get the service plan.
     */
    public function service_plan()
    {
        //Deleted record is required here
        return $this->hasMany('App\Model\ServicePlan');
    }



    public static function getAllServiceForListing()
    {
    	return Service::pluck('name','id');
    }

}
