<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Service;
use App\Model\Partner;



class PartnerService extends Model
{
    use Sortable;

    protected $fillable = [ 'partner_id', 'service_id' ];

    public $sortable = ['id', 'partner_id', 'service_id', 'created_at', 'updated_at'];




    /**
     * Get the partner that owns the partner service.
     */
    public function partner()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Partner', 'partner_id')->withTrashed();
    }


    /**
     * Get the service that owns the partner service.
     */
    public function service()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Service', 'service_id')->withTrashed();
    }


    

}
