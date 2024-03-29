<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounts_invitation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
