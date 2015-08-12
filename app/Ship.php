<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
