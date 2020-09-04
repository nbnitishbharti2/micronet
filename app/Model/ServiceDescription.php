<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Service;
use App\Model\ServiceDescription;



class ServiceDescription extends Model
{
    use Sortable;

    use SoftDeletes;

    protected $fillable = [ 'service_id', 'description' ];

    public $sortable = ['id', 'service_id', 'description', 'created_at', 'updated_at'];


    public static function getAvailability(){
        return [
            'Yes' => 'Yes',
            'No' => 'No',
        ];
    }




    /**
     * Get the service that owns the service description.
     */
    public function service()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Service', 'service_id')->withTrashed();
    }


    

}
