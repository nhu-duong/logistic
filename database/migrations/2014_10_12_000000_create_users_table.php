<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('is_login')->default(0);
            $table->string('activation_code', 50);
            $table->string('reset_pass_code', 50)->nullable();
            $table->datetime('reset_pass_expired_at')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
