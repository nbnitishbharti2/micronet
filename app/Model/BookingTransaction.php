<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\User;
use App\Model\Partner;
use App\Model\Booking;




class BookingTransaction extends Model
{
    use Sortable;

    protected $fillable = [ 'user_id', 'booking_id', 'partner_id', 'payment_mode', 'payment_2', 'settle_status', 'amount' ];

    public $sortable = ['id', 'user_id', 'booking_id', 'partner_id', 'payment_mode', 'payment_2', 'settle_status', 'amount', 'created_at', 'updated_at'];



    /**
     * Get the User that owns the booking transaction.
     */
    public function user()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\User', 'user_id');
    }


    /**
     * Get the Partner that owns the booking transaction.
     */
    public function partner()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\User', 'partner_id');
    }

    /**
     * Get the Booking that owns the booking transaction.
     */
    public function booking()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\Booking', 'booking_id');
    }


    public static function settleStatus()
    {
        return [
            'Unsettled' => 'Unsettled',
            'Settled' => 'Settled',
        ];
    }



}
