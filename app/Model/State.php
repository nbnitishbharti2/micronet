<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Partner;
use App\Models\User;



class State extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name'];

    public $sortable = ['id', 'name', 'created_at', 'updated_at'];



    /**
     * Get the cities for the state.
     */
    public function city()
    {
        return $this->hasMany('App\Models\City', 'city_id', 'id');
    }


    /**
     * Get the users for the state.
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
     * Get the state list for listing.
     */
    public static function getAllStateForListing()
    { 
        return State::pluck('name','id');
    }


    
}
