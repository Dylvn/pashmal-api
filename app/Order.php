<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'billing_address', 'billing_postalcode', 'billing_city', 'delivery_address', 'delivery_postalcode', 'delivery_city', 'ttc_price', 'ht_price', 'user_id',
    ];

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Get the books.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
