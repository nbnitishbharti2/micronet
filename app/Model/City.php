<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'state_id' ];

    public $sortable = ['id', 'name', 'state_id', 'created_at', 'updated_at'];


    /**
     * Get the State that owns the city.
     */
    public function state()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\State', 'state_id')->withTrashed();
    }


    /**
     * Get the users for the city.
     */
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Get the partners for the state.
     */
    public function partner()
    {
        return $this->hasMany('App\Models\Partner');
    }


    /**
     * Get the city list for listing.
     */
    public static function getAllCityForListing($state_id)
    { 
        return City::where('state_id',$state_id)->pluck('name','id');
    }
    
}
