<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\State;
use App\Models\City;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'user_type', 'name', 'email', 'password', 'mobile', 'state_id', 'city_id', 'zip', 'address', 'aadhar', 'image', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the State that owns the user.
     */
    public function state()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\State', 'state_id')->withTrashed();
    }


    /**
     * Get the City that owns the user.
     */
    public function city()
    {
        //Deleted record is required here
        return $this->belongsTo('App\Model\City', 'city_id')->withTrashed();
    }


    public static function getAllPartners()
    {
        return User::where('user_type','Partner')->pluck('name','id');
    }
}
