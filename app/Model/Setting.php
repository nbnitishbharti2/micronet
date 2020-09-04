<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;



class Setting extends Model
{
    use Sortable;


    protected $fillable = [ 'email',  'mobile', 'address', 'zip', 'commission' ];

    public $sortable = ['id', 'email',  'mobile', 'address', 'zip', 'commission', 'created_at', 'updated_at'];

   

}
