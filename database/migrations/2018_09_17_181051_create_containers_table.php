<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->string('container_no', 50);
            $table->string('seal_no', 50);
            $table->integer('cont_type');
            $table->integer('packages');
            $table->decimal('weight', 10, 0);
            $table->decimal('volume', 10, 0);
            $table->text('description');
            $table->text('shipping_marks');
            $table->timestamps();
            
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('containers', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::drop('containers');
    }
}
