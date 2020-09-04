<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\SubCategory;
use App\Model\Service;

class Type extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'image' ];

    public $sortable = ['id', 'name', 'created_at', 'updated_at'];



    /**
     * Get the subcategory for the type.
     */
    public function sub_category()
    {
        return $this->hasMany('App\Model\SubCategory', 'sub_category_id', 'id');
    }


    /**
     * Get the service for the type.
     */
    public function service()
    {
        return $this->hasMany('App\Model\Service');
    }



    /*
    * Get the type list for listing.
    */
    public static function getAllTypeForListing()
    {
    	return Type::select('types.id', 'types.name')->get();
    }

}
