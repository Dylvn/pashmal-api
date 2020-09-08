<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'address', 'postalcode', 'city', 'reset_password_token',
    ];

    protected $hidden = [
        'password', 'reset_password_token',
    ];

    public $timestamps = false;

    /**
     * The orders that belong to the users.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
