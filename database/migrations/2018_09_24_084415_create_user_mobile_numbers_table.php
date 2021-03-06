<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMobileNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mobile_numbers', function (Blueprint $table) {
           $table->increments('mobile_number_id');
            $table->string('mobile_number');
            $table->integer('user_id');
            $table->tinyInteger('active')->default('1')->comment = 'active user=1, inactive=0';
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
        Schema::dropIfExists('user_mobile_numbers');
    }
}
