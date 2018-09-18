<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_bill_no', 50);
            $table->string('master_bill_no', 50);
            $table->tinyInteger('order_type');
            $table->integer('seller_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('remote_agent')->nullable();
            $table->string('descrition_of_goods', 200);
            $table->integer('ship_id')->nullable();
            $table->string('shipment_ship_name', 200)->nullable();
            $table->string('shipment_voyage', 20)->nullable();
            $table->string('pre_carriage_by', 200)->nullable();
            $table->string('shipment_container_no', 20)->nullable();
            $table->string('shipment_seal_no', 20)->nullable();
            $table->integer('shipment_type');
            $table->integer('loading_port_id')->nullable();
            $table->integer('discharging_port_id')->nullable();
            $table->string('place_of_delivery', 200)->nullable();
            $table->string('place_of_receipt', 200)->nullable();
            $table->string('freight_payable_at', 200)->nullable();
            $table->string('number_of_original_bs_l', 200)->nullable();
            $table->string('marks', 200)->nullable();
            $table->float('fee_ocean_freight')->default(0);
            $table->integer('fee_do')->default(0);
            $table->integer('fee_thc')->default(0);
            $table->integer('fee_cic')->default(0);
            $table->integer('fee_cleaning')->default(0);
            $table->integer('fee_handling')->default(0);
            $table->float('exchange_rate')->default(1);
            $table->string('description', 200)->nullable();
            $table->string('short_description', 200)->nullable();
            $table->integer('truck_id')->nullable();
            $table->string('trucking_service_type', 200)->nullable();
            $table->string('arrival_digital', 20)->nullable();
            $table->string('contact_person', 200)->nullable();
            $table->string('customer_type', 50)->nullable();
            $table->string('commercial_invoice_no', 200)->nullable();
            $table->date('shipped_onboard_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('quotation_date')->nullable();
            $table->timestamps();
        });
        
        Schema::table('orders', function(Blueprint $table) {
            $table->unique(['house_bill_no', 'master_bill_no']);
            $table->index('order_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
