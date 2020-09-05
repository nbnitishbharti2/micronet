<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\SubCategory;
use App\Model\Service;

class Gallery extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'image' ];

    public $sortable = ['id', 'name', 'created_at', 'updated_at'];


    /*
    * Get the type list for listing.
    */
    public static function getAllTypeForListing()
    {
    	return Type::select('types.id', 'types.name')->get();
    }

}
