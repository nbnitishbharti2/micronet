<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\State;
use App\Models\City;
use App\Model\partnerService;

class Partner extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'name', 'email', 'password', 'mobile', 'state_id', 'city_id', 'zip', 'address', 'aadhar', 'image' ];

    public $sortable = ['id', 'name', 'email', 'password', 'mobile', 'state_id', 'city_id', 'zip', 'address', 'aadhar', 'image', 'created_at', 'updated_at'];

   /**
     * Get the State that owns the partner.
     */
    public function state()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\State', 'state_id')->withTrashed();
    }


    /**
     * Get the City that owns the partner.
     */
    public function city()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\City', 'city_id')->withTrashed();
    }


    /**
     * Get the City that owns the partner.
     */
    public function partnerService()
    {
        //Deleted record is required here
        return $this->hasMany('App\Model\partnerService', 'partner_id', 'id');
    }

}
