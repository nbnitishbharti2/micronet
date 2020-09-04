<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Type;
use App\Model\Category;
use App\Model\Service;



class SubCategory extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'image', 'type_id', 'category_id' ];

    public $sortable = ['id', 'name', 'type_id', 'category_id', 'created_at', 'updated_at'];




    /**
     * Get the type that owns the sub category.
     */
    public function type()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Type', 'type_id')->withTrashed();
    }


    /**
     * Get the category that owns the sub category.
     */
    public function category()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Category', 'category_id')->withTrashed();
    }


    /**
     * Get the service for the type.
     */
    // public function service()
    // {
    //     return $this->hasMany('App\Model\Service', 'service_id', 'id');
    // }
    public function service()
    {
        return $this->hasMany('App\Model\Service');
    }


    /*
    * Get the category list for listing.
    */
    public static function getAllSubCategoryForListing()
    {
    	return SubCategory::select('sub_categories.id', 'sub_categories.name')->get();
    }

}
