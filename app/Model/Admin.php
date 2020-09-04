<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPassword as ResetPasswordNotification;
    class Admin extends Authenticatable
    {
        use Notifiable;
        protected $table = 'admins';
        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function sendPasswordResetNotification($token) {
                $this->notify(new ResetPasswordNotification($token));
        }
    }