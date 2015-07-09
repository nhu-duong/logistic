<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'short_name', 'address', 'email', 'phone', 'fax', 'is_buyer', 'is_seller', 'is_agent'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
