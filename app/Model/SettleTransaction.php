<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\User;





class SettleTransaction extends Model
{
    use Sortable;

    protected $fillable = [ 'partner_id', 'total_unsettled_amount', 'total_unsettled_amount_to_partner', 'total_unsettled_amount_to_admin', 'total_commission', 'settle_status', 'payment_flow_type', 'payment_flow' ];

    public $sortable = ['id', 'partner_id', 'total_unsettled_amount', 'total_unsettled_amount_to_partner', 'total_unsettled_amount_to_admin', 'total_commission', 'settle_status', 'payment_flow_type', 'payment_flow', 'created_at', 'updated_at'];



    public static function settleStatus()
    {
        return [
            'Unsettled' => 'Unsettled',
            'Settled' => 'Settled',
        ];
    }

    /**
     * Get the Partner that owns the booking transaction.
     */
    public function partner()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\User', 'partner_id');
    }




}
