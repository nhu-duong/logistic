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
    protected $fillable = ['house_bill_no', 'master_bill_no', 'remote_agent', 'seller_id', 'buyer_id', 
        'description_of_goods', 'ship_id', 'loading_port_id', 'discharging_port_id', 'freight_payable_at', 
        'shipment_container_no', 'shipment_seal_no', 'place_of_delivery', 'place_of_receipt', 'marks', 
        'fee_ocean_freight', 'fee_do', 'fee_thc', 'fee_cic', 'fee_cleaning', 
        'fee_handling', 'exchange_rate', 'shipment_voyage', 'description', 'short_description', 
        'shipped_onboard_date', 'arrival_date', 'order_type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function seller()
    {
        return $this->belongsTo('App\Address', 'seller_id', 'id');
    }
    public function buyer()
    {
        return $this->belongsTo('App\Address', 'buyer_id', 'id');
    }
}
