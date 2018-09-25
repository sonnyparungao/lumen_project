<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMobileNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_mobile_numbers', function (Blueprint $table) {
           $table->increments('mobile_number_id');
            $table->string('mobile_number')->unique();
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
        Schema::dropIfExists('users_mobile_numbers');
    }
}
