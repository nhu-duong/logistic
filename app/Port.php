<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
