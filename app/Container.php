<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model {

    const CONT_TYPE_20 = 20;
    const CONT_TYPE_40 = 40;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'containers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'container_no', 'seal_no', 'cont_type', 'packages', 'weight', 'volume', 'description', 'shipping_marks'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function getPackages()
    {
        return $this->packages;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function getVolume()
    {
        return $this->volume;
    }
    /**
     * order() one-to-many relationship method
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
    
    public static function getContainerTypes()
    {
        return [
            self::CONT_TYPE_20 => '20ft',
            self::CONT_TYPE_40 => '40ft',
        ];
    }
}
