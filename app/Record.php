<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'records';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
