<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['house_bill_no', 'master_bill_no', 'description_of_goods', 'shipment_container_no', 'shipment_seal_no', 'place_of_delivery', 'place_of_receipt', 'marks', 'fee_ocean_freight', 'fee_do', 'fee_thc', 'fee_cic', 'fee_cleaning', 'fee_handling', 'exchange_rate', 'description', 'short_description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
