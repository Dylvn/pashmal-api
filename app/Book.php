<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'price', 'description', 'available', 'created_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The genres that belong to the books.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    /**
     * The orders that belong to the books.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
